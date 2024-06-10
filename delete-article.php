<?php

require 'classes/Database.php';
require 'classes/Article.php';
require 'classes/Auth.php';
require 'includes/url.php';

session_start();

$db = new Database();
$conn = $db->getConn();




if (isset($_GET['id'])) {
  $article = Article::getById($conn, $_GET['id']);

  if (!$article) {
    die("article not found");
  }
} else {
  die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if ($article->delete($conn)) {
    redirect("/cms/index.php");
  }
}

?>
<?php require 'includes/header.php'; ?>

<?php if (Auth::isLoggedIn()) : ?>
  <h2>Delete article</h2>

  <form method="post">
    <p>Are you sure?</p>
    <button>Delete</button>
    <a href="article.php?id=<?= $article->id; ?>">Cancel</a>
  </form>
<?php else : ?>
  <p>Unauthorised</p>
<?php endif; ?>



<?php require 'includes/footer.php'; ?>