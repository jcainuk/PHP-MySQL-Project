<?php


require('../includes/init.php');

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {
  $article = Article::getById($conn, $_GET['id']);

  if (!$article) {
    die("article not found");
  }
} else {
  die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  var_dump($_FILES);

  try {

    if (empty($_FILES)) {
      throw new Exception('Invalid upload');
    }

    switch ($_FILES['file']['error']) {
      case UPLOAD_ERR_OK:
        break;
      case UPLOAD_ERR_NO_FILE:
        throw new Exception('No file uploaded');
        break;
      case UPLOAD_ERR_INI_SIZE:
        throw new Exception('File is too large (from the server settings)');
        break;
      default:
        throw new Exception('An error occurred');
    }

    if ($_FILES['file']['size'] > 2000000) {
      throw new Exception('File is too large');
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

?>

<?php require '../includes/header.php'; ?>

<h2>Edit Article Image</h2>

<form method="post" enctype="multipart/form-data">
  <div>
    <label for="file">Image file</label>
    <input type="file" name="file" id="file">
  </div>
  <button>Upload</button>
</form>

<?php require '../includes/footer.php'; ?>