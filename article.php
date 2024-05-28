<?php

require 'includes/database.php';

// check the id is numeric before passing to sql query
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  // SQL query 
  $sql = "SELECT *
        FROM article
        WHERE id = " . $_GET['id'];


  // Send SQL query to database
  $results = mysqli_query($conn, $sql);

  // If there's a problem with the results show the error
  if ($results === false) {
    echo mysqli_error($conn);

    // else fetch all the results
  } else {
    $article = mysqli_fetch_assoc($results);
  }
} else {
  $article = null;
}



?>
<?php require 'includes/header.php' ?>

<?php if ($article === null) : ?>
  <p>Article not found.</p>
<?php else : ?>


  <article>
    <h2><?= $article['title']; ?></h2>
    <p><?= $article['content']; ?></p>
  </article>

<?php endif; ?>

<?php require 'includes/footer.php' ?>