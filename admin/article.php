<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {
  $article = Article::getWithCategories($conn, $_GET['id']);
} else {
  $article = null;
}



?>
<?php require '../includes/header.php' ?>

<?php if ($article) : ?>

  <article>
    <h2><?= htmlspecialchars($article[0]['title']); ?></h2>
    <div>
      <?php if ($article[0]['published_at']) : ?>
        <time><?= $article[0]['published_at'] ?></time>
    </div>
  <?php else : ?>
    <div>Unpublished</div>
  <?php endif; ?>

  <?php if ($article[0]['category_name']) : ?>
    <p>Categories</p>
    <div>
      <?php foreach ($article as $a) : ?>
        <span class="badge bg-info text-dark"><?= htmlspecialchars($a['category_name']); ?></span>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if ($article[0]['image_file']) : ?>
    <img src="/cms/uploads/<?= $article[0]['image_file']; ?>" alt="">
  <?php endif; ?>

  <p><?= htmlspecialchars($article[0]['content']); ?></p>
  </article>

  <a href="edit-article.php?id=<?= $article[0]['id']; ?>">Edit</a>
  <a class="delete" href="delete-article.php?id=<?= $article[0]['id']; ?>">Delete</a>
  <a href="edit-article-image.php?id=<?= $article[0]['id']; ?>">Edit image</a>

<?php else : ?>

  <p>Article not found.</p>

<?php endif; ?>

<?php require '../includes/footer.php' ?>