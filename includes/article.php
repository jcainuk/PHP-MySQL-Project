<?php

/**
 * Get the article record base on the ID
 * @param  object $conn Connection to the database.
 * @param  integer $id the article ID.
 * @param string $columns Optional list of columns for the select, defaults to *
 * @return mixed An associative array containing the article with that ID, or null if not found.
 */
function getArticle($conn, $id, $columns = '*')
{
  $sql = "SELECT $columns FROM article WHERE id = :id";

  $stmt = $conn->prepare($sql);

  $stmt->bindValue(':id', $id, PDO::PARAM_INT);

  if ($stmt->execute()) {

    return $stmt->fetch(PDO::FETCH_ASSOC);
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
