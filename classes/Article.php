<?php

/**
 * Article
 * 
 * A piece of writing for publication
 */
class Article
{
  /**
   * Get all articles
   * 
   * @param object $conn Connection to the database
   * 
   * @return array An associative array of all the article records
   */
  public static function getAll($conn)
  {

    $sql = "SELECT *
        FROM article
        ORDER BY published_at";

    $results = $conn->query($sql);

    return  $results->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Get the article record base on the ID
   * @param  object $conn Connection to the database.
   * @param  integer $id the article ID.
   * @param string $columns Optional list of columns for the select, defaults to *
   * @return mixed An associative array containing the article with that ID, or null if not found.
   */
  public static function getById($conn, $id, $columns = '*')
  {
    $sql = "SELECT $columns FROM article WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }
}
