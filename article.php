<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

if (isset($_GET['id'])) {
  $article = Article::getWithCategories($conn, $_GET['id'], true);
} else {
  $article = null;
}


?>
<?php require 'includes/header.php' ?>

<?php if ($article) : ?>
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <article class="card">
          <div class="card-body">
            <h2 class="card-title text-center"><?= htmlspecialchars($article[0]['title']); ?></h2>

            <time datetime=" <?= $article[0]['published_at'] ?>">
              <?php $datetime = new DateTime($article[0]['published_at']);
              echo $datetime->format("j F, Y"); ?></time>

            <?php if ($article[0]['category_name']) : ?>
              <div>
                <div><span>Categories: </span>
                  <?php foreach ($article as $a) : ?>
                    <span class="badge bg-info text-dark"><?= htmlspecialchars($a['category_name']); ?></span>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($article[0]['image_file']) : ?>
              <img class="card-img-top" src="/cms/uploads/<?= $article[0]['image_file']; ?>" alt="">
            <?php endif; ?>

            <p class="card-text"><?= htmlspecialchars($article[0]['content']); ?></p>
          </div>
        </article>
      </div>
    </div>
  </div>

<?php else : ?>

  <p>Article not found.</p>

<?php endif; ?>

<?php require 'includes/footer.php' ?>