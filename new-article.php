<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $sql = "INSERT INTO article (title, content, published_at)
  VALUES(
    '" . $_POST['title'] . "', '"
    . $_POST['content'] . "', '"
    . $_POST['published_at'] . "')";

  var_dump($sql);
  exit;

  $results = mysqli_query($conn, $sql);

  if ($results === false) {
    echo mysqli_error($conn);
  } else {
    $article = mysqli_fetch_assoc($results);
  }
}
?>

<?php require 'includes/header.php'; ?>

<h2>New Article</h2>

<form method="post">

  <div>
    <label for="title">Title</label>
    <input name="title" id="title" placeholder="Article title">
  </div>

  <div>
    <label for="content">Content</label>
    <textarea name="content" id="content" placeholder="Article content" rows="4" cols="40"></textarea>
  </div>

  <div>
    <label for="published_at">Publication date and time</label>
    <input type="datetime-local" name="published_at" id="published_at">
  </div>

  <button>Add</button>
</form>

<?php require 'includes/footer.php'; ?>