<?php

require 'includes/database.php';
require 'includes/auth.php';

session_start();

$conn = getDb();

// SQL query 
$sql = "SELECT *
        FROM article
        ORDER BY published_at";


// Send SQL query to database
$results = mysqli_query($conn, $sql);

// If there's a problem with the results show the error
if ($results === false) {
  echo mysqli_error($conn);

  // else fetch all the results
} else {
  $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

?>
<?php require 'includes/header.php'; ?>

<?php if (isLoggedIn()) : ?>
  <p>You are logged in.</p>
  <a href="logout.php">Log out</a>
  <p><a href="new-article.php">New article</a></p>


<?php else : ?>
  <p>You are not logged in</p>
  <a href="login.php">Log in</a>

<?php endif; ?>



<?php if (empty($articles)) : ?>
  <p>No articles found.</p>
<?php else : ?>
  <ul>
    <?php foreach ($articles as $article) : ?>
      <li>
        <article>
          <h2>
            <a href="article.php?id=<?= $article['id'] ?>"><?= htmlspecialchars($article['title']); ?></a>
          </h2>

          <p><?= htmlspecialchars($article['content']); ?></p>
        </article>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php require 'includes/footer.php' ?>