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
