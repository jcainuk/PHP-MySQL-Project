<?php

require('../includes/init.php');

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {
  $article = Article::getById($conn, $_GET['id']);

  if (!$article) {
    die("article not found");
  }
} else {
  die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
}

?>

<?php require '../includes/header.php'; ?>

<h2>Edit Article Image</h2>

<?php require '../includes/footer.php'; ?>