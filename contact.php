<?php
require 'includes/init.php';
?>
<?php require 'includes/header.php'; ?>

<h2>Contact</h2>

<form method="post">
  <div class="form-group">
    <label for="email">Your email</label>
    <input class="form-control" type="email" id="email" placeholder="Your email">
  </div>

  <div class="form-group">
    <label for="subject">Subject</label>
    <input class="form-control" type="text" name="subject" id="subject" placeholder="Subject">
  </div>

  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" name="message" id="message" placeholder="Message"></textarea>
  </div>

  <button class="btn btn-primary">Send</button>
</form>

<?php require 'includes/footer.php'; ?>