<?php
require 'includes/database.php';

$errors = [];
$title = '';
$content = '';
$published_at = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $title = $_POST['title'];
  $content = $_POST['content'];
  $published_at = $_POST['published_at'];

  if ($title === '') {
    $errors[] = 'Title is required';
  }
  if ($content === '') {
    $errors[] = 'Content is required';
  }
  if ($published_at === '') {
    $errors[] = 'Date is required';
  }

  if (empty($errors)) {


    $conn = getDb();

    // Prepared SQL Statement AVOID SQL injection!

    // 1.  Use placeholders ? in the values in SQL
    $sql = "INSERT INTO article (title, content, published_at)
  VALUES( ?, ?, ?)";

    // 2 .  Use prepare (instead of query)
    // stmt = statement
    $stmt = mysqli_prepare($conn, $sql);

    // if the statement is false ouput error
    if ($stmt === false) {
      echo mysqli_error($conn);
    } else {

      /*3.  mysqli_stmt_bind_param function

        a.  First bind the statement above

        b. We have 3 string types so we use 3 s like sss  (i for integer etc)

        c. get values from the $_POST superglobal array

        - */
      mysqli_stmt_bind_param($stmt, "sss", $title, $content, $published_at);

      // 4.  Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        $id = mysqli_insert_id($conn);
        echo "Inserted record with ID: $id";
      } else {
        echo mysqli_stmt_error($stmt);
      }
    }
  }
}
?>

<?php require 'includes/header.php'; ?>

<h2>New Article</h2>

<?php if (!empty($errors)) : ?>

  <ul>
    <?php foreach ($errors as $error) : ?>

      <li><?= $error ?></li>

    <?php endforeach; ?>
  </ul>


<?php endif; ?>

<form method="post">

  <div>
    <label for="title">Title</label>
    <input name="title" id="title" placeholder="Article title" value="<?= $title ?>">
  </div>

  <div>
    <label for="content">Content</label>
    <textarea name="content" id="content" placeholder="Article content" rows="4" cols="40"><?= $content ?></textarea>
  </div>

  <div>
    <label for="published_at">Publication date and time</label>
    <input type="datetime-local" name="published_at" id="published_at" value="<?= $published_at ?>">
  </div>

  <button>Add</button>
</form>

<?php require 'includes/footer.php'; ?>