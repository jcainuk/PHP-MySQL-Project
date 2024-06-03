<?php

/**
 * Get the article record base on the ID
 * @param  object $conn Connection to the database.
 * @param  integer $id the article ID.
 * @return mixed An associative array containing the article with that ID, or null if not found.
 */
function getArticle($conn, $id)
{
  $sql = "SELECT * FROM article WHERE id = ?";

  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt === false) {
    echo mysqli_error($conn);
  } else {
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {

      $result = mysqli_stmt_get_result($stmt);

      return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
  }
}

/**
 * Validate the article properties
 * 
 * @param  string $title Title, required.
 * @param  string $content Content, required
 * @param string $published_at Published date and time, required 
 * 
 * @return array An array of validation error messages
 */
function validateArticle($title, $content, $published_at)
{
  $errors = [];

  if ($title === '') {
    $errors[] = 'Title is required';
  }
  if ($content === '') {
    $errors[] = 'Content is required';
  }
  if ($published_at === '') {
    $errors[] = 'Date is required';
  }

  return $errors;
}
