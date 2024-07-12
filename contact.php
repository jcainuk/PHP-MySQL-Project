<?php
require 'includes/init.php';

$email = '';
$subject = '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $errors = [];

  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $errors[] = 'Please enter a valid email address';
  }

  if ($subject == '') {
    $errors[] = 'Please enter a subject';
  }

  if ($message == '') {
    $errors[] = 'Please enter a message';
  }

  if (empty($errors)) {
  }
}
?>
<?php require 'includes/header.php'; ?>

<h2>Contact</h2>

<?php if (!empty($errors)) : ?>
  <ul>
    <?php foreach ($errors as $error) : ?>
      <li><?= $error ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<form method="post">
  <div class="form-group">
    <label for="email">Your email</label>
    <input class="form-control" type="email" id="email" placeholder="Your email" name="email" value="<?= htmlspecialchars($email) ?>">
  </div>

  <div class="form-group">
    <label for="subject">Subject</label>
    <input class="form-control" type="text" name="subject" id="subject" placeholder="Subject" value="<?= htmlspecialchars($subject) ?>">
  </div>

  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" name="message" id="message" placeholder="Message" value="<?= htmlspecialchars($message) ?>"></textarea>
  </div>

  <button class="btn btn-primary">Send</button>
</form>

<?php require 'includes/footer.php'; ?>