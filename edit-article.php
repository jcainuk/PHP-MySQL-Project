<?php

require 'includes/database.php';
require 'includes/article.php';

$conn = getDb();

if (isset($_GET['id'])) {
  $article = getArticle($conn, $_GET['id']);

  if ($article) {
    $title = $article['title'];
    $content = $article['content'];
    $published_at = $article['published_at'];
  } else {
    die("article not found");
  }
} else {
  die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $title = $_POST['title'];
  $content = $_POST['content'];
  $published_at = $_POST['published_at'];

  $errors = validateArticle($title, $content, $published_at);

  if (empty($errors)) {
    die("Form is valid");
  }
}

?>

<?php require 'includes/header.php'; ?>

<h2>Edit Article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>