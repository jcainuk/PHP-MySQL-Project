<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <header>
    <h1>My Blog</h1>
  </header>

  <nav>
    <ul>
      <li><a href="/cms/">Home</a></li>
      <?php if (Auth::isLoggedIn()) : ?>
        <li><a href="/cms/admin/">Admin</a></li>
        <li><a href="/cms/logout.php">Log out</a></li>
      <?php else : ?>
        <li><a href="/cms/login.php">Log in</a></li>
      <?php endif; ?>
    </ul>
  </nav>
  <main>