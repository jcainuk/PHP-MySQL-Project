<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>My Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="/cms/css/styles.css">
</head>

<body>
  <div class="container">
    <header>
      <h1>My Blog</h1>
    </header>

    <nav>
      <ul class="nav">
        <li class="nav-item"><a class="nav-link" href="/cms/">Home</a></li>
        <?php if (Auth::isLoggedIn()) : ?>
          <li class="nav-item"><a class="nav-link" href="/cms/admin/">Admin</a></li>
          <li class="nav-item"><a class="nav-link" href="/cms/logout.php">Log out</a></li>
        <?php else : ?>
          <li class="nav-item"><a class="nav-link" href="/cms/login.php">Log in</a></li>
        <?php endif; ?>
      </ul>
    </nav>
    <main>