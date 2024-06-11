<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

$articles = Article::getAll($conn);

?>
<?php require '../includes/header.php'; ?>

<?php if (Auth::isLoggedIn()) : ?>
  <p>You are logged in.</p>
  <a href="logout.php">Log out</a>
  <p><a href="new-article.php">New article</a></p>


<?php else : ?>
  <p>You are not logged in</p>
  <a href="login.php">Log in</a>

<?php endif; ?>

<h2>Administration</h2>

<?php if (empty($articles)) : ?>
  <p>No articles found.</p>
<?php else : ?>
  <table>
    <thead>
      <th>Title</th>
    </thead>
    <tbody>
      <?php foreach ($articles as $article) : ?>
        <tr>
          <td>
            <a href="article.php?id=<?= $article['id'] ?>"><?= htmlspecialchars($article['title']); ?></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

<?php require '../includes/footer.php' ?>