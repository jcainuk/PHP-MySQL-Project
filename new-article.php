<?php
require 'classes/Database.php';
require 'classes/Article.php';
require 'includes/url.php';
require 'includes/auth.php';

session_start();

if (!isLoggedin()) {
  die('unauthorised');
}

$article = new Article();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $db = new Database();
  $conn = $db->getConn();

  $article->title = $_POST['title'];
  $article->content = $_POST['content'];
  $article->published_at = $_POST['published_at'];

  if ($article->create($conn)) {

    redirect("/cms/article.php?id={$article->id}");
  }
}
?>

<?php require 'includes/header.php'; ?>

<h2>New Article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>