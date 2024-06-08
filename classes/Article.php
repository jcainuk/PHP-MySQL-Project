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
}
