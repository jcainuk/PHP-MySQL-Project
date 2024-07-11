<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn, true));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset, true);

?>
<?php require 'includes/header.php'; ?>

<?php if (empty($articles)) : ?>
  <p>No articles found.</p>
<?php else : ?>

  <ul>
    <?php foreach ($articles as $article) : ?>
      <li>
        <article>
          <h2><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h2>

          <?php if ($article['category_names']) : ?>
            <p>Categories:
              <?php foreach ($article['category_names'] as $name) : ?>
                <?= htmlspecialchars($name); ?>
              <?php endforeach; ?>
            </p>
          <?php endif; ?>

          <p><?= htmlspecialchars($article['content']); ?></p>
        </article>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php require 'includes/pagination.php' ?>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>