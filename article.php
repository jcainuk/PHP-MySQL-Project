<?php

require 'includes/database.php';
require 'includes/article.php';

$conn = getDb();


if (isset($_GET['id'])) {
  $article = getArticle($conn, $_GET['id']);
} else {
  $article = null;
}



?>
<?php require 'includes/header.php' ?>

<?php if ($article === null) : ?>
  <p>Article not found.</p>
<?php else : ?>


  <article>
    <h2><?= htmlspecialchars($article['title']); ?></h2>
    <p><?= htmlspecialchars($article['content']); ?></p>
  </article>
  <a href="edit-article.php?id=<?= $article['id']; ?>">Edit</a>
  <form method="post" action="delete-article.php?id=<?= $article['id']; ?>">
    <button>Delete</button>
  </form>

<?php endif; ?>

<?php require 'includes/footer.php' ?>