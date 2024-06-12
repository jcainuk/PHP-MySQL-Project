<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

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
          <p><?= htmlspecialchars($article['content']); ?></p>
        </article>
      </li>
    <?php endforeach; ?>
  </ul>

  <nav>
    <ul>
      <li>
        <?php if ($paginator->previous) : ?>
          <a href="?page=<?= $paginator->previous; ?>">Previous</a>
        <?php else : ?>
          Previous
        <?php endif; ?>
      </li>
      <li>
        <?php if ($paginator->next) : ?>
          <a href="?page=<?= $paginator->next; ?>">Next</a>
        <?php else : ?>
          Next
        <?php endif; ?>
      </li>
    </ul>
  </nav>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>