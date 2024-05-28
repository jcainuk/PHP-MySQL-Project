<?php

// Credentials
$db_host = "localhost";
$db_name = "cms";
$db_user = "cms_www";
$db_pass = "CpGIIO(bYdn248HU";

// Save connection to database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check if not connected
if (mysqli_connect_error()) {
  echo mysqli_connect_error();
  exit;
}

// Print a message if connected successfully
//echo "Connected successfully.";


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

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Blog</title>
</head>

<body>
  <header>
    <h1>My Blog</h1>
  </header>
  <main>
    <?php if ($article === null) : ?>
      <p>Article not found.</p>
    <?php else : ?>


      <article>
        <h2><?= $article['title']; ?></h2>
        <p><?= $article['content']; ?></p>
      </article>


    <?php endif; ?>
  </main>

</body>

</html>