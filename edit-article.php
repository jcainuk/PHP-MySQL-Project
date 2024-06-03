<?php

require 'includes/database.php';
require 'includes/article.php';
require 'includes/url.php';

$conn = getDb();

if (isset($_GET['id'])) {
  $article = getArticle($conn, $_GET['id']);

  if ($article) {
    $id = $article['id'];
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

    // Prepared SQL Statement AVOID SQL injection!

    // 1.  Use placeholders ? in the values in SQL
    $sql = "UPDATE article
    SET title = ?, content = ?, published_at = ?
    WHERE id = ?";

    // 2 .  Use prepare (instead of query)
    // stmt = statement
    $stmt = mysqli_prepare($conn, $sql);

    // if the statement is false ouput error
    if ($stmt === false) {
      echo mysqli_error($conn);
    } else {

      /*3.  mysqli_stmt_bind_param function

        a.  First bind the statement above

        b. We have 3 string types so we use 3 s like sss  (i for integer etc)

        c. get values from the $_POST superglobal array

        - */
      mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $published_at, $id);

      // 4.  Execute the statement
      if (mysqli_stmt_execute($stmt)) {

        redirect("/cms/article.php?id=$id");
      } else {
        echo mysqli_stmt_error($stmt);
      }
    }
  }
}


?>

<?php require 'includes/header.php'; ?>

<h2>Edit Article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>