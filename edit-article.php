<?php

require 'includes/database.php';
require 'includes/article.php';

$conn = getDb();

if (isset($_GET['id'])) {
  $article = getArticle($conn, $_GET['id']);

  $title = $article['title'];
  $content = $article['content'];
  $published_at = $article['published_at'];
} else {
  $article = null;
}

?>

<?php require 'includes/header.php'; ?>

<h2>Edit Article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>