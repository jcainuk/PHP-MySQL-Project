<?php

/**
 * Category
 * 
 * Groupings for articles
 */
class Category
{
  /**
   * Get all categories
   * 
   * @param object $conn Connection to the database
   * 
   * @return array An associative array of all the category records
   */
  public static function getAll($conn)
  {

    $sql = "SELECT *
        FROM category
        ORDER BY name";

    $results = $conn->query($sql);

    return  $results->fetchAll(PDO::FETCH_ASSOC);
  }
}
