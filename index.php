<?php
$articles = [
  [
    "title" => "First post",
    "content" => "This is the first of many posts!"
  ],
  [
    "title" => "Another post",
    "content" => "Yet another fascinating post..."
  ],
  [
    "title" => "Read this!",
    "content" => "You must read this now, it's essential reading!"
  ]
];

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
echo "Connected successfully.";


// SQL query 
$sql = "SELECT *
        FROM article
        ORDER BY published_at";


// Send SQL query to database
$results = mysqli_query($conn, $sql);

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
    <ul>
      <?php foreach ($articles as $article) : ?>
        <li>
          <article>
            <h2><?= $article['title']; ?></h2>
            <p><?= $article['content']; ?></p>
          </article>
        </li>
      <?php endforeach; ?>
    </ul>
  </main>

</body>

</html>