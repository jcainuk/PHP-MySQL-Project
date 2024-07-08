<?php

/**
 * Article
 * 
 * A piece of writing for publication
 */
class Article
{
  /**
   * Unique identifier
   * @var integer
   */
  public $id;
  /**
   * The article title
   * @var string
   */
  public $title;
  /**
   * The article content
   * @var string
   */
  public $content;
  /**
   * The publication date and time
   * @var datetime
   */
  public $published_at;
  /**
   * Path to the image
   * @var string
   */
  public $image_file;
  /**
   * Validation errors
   * @var array
   */
  public $errors = [];

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
   * Get a page of articles
   * 
   * @param object $conn Connection to the database
   * @param integer $limit Number of records to return
   * @param integer $offset Number of records to skip
   * 
   * @return array An associative array of the page of article records
   */
  public static function getPage($conn, $limit, $offset)
  {
    $sql = "SELECT *
            FROM article
            ORDER BY published_at
            LIMIT :limit
            OFFSET :offset";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Get the article record base on the ID
   * @param  object $conn Connection to the database.
   * @param  integer $id the article ID.
   * @param string $columns Optional list of columns for the select, defaults to *
   * @return mixed An object of this class or null if not found.
   */
  public static function getById($conn, $id, $columns = '*')
  {
    $sql = "SELECT $columns FROM article WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');

    if ($stmt->execute()) {

      return $stmt->fetch();
    }
  }

  /**
   * Get the article record based on the ID along with associated categories, if any
   * 
   * @param object $conn Connection to the database
   * @param integer $id the article ID
   * 
   * @return array The article data with categories
   */
  public static function getWithCategories($conn, $id)
  {

    $sql = "SELECT article.*, category.name AS category_name
            FROM article
            LEFT JOIN article_category
            ON article.id = article_category.article_id
            LEFT JOIN category
            ON article_category.category_id = category.id
            WHERE article.id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Get the article's categories
   * 
   * @param object $conn Connection to the database
   * 
   * @return array The category data
   */
  public function getCategories($conn)
  {
    $sql = "SELECT category.* 
            FROM category 
            JOIN article_category 
            ON category.id = article_category.category_id 
            WHERE article_id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Update the article with its current property values
   * 
   * @param object $conn Connection to the database
   * 
   * @return boolean True if the update was successful, false otherwise
   */
  public function update($conn)
  {
    if ($this->validate()) {
      $sql = "UPDATE article
    SET title = :title, content = :content, published_at = :published_at
    WHERE id = :id";

      $stmt = $conn->prepare($sql);

      $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
      $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
      $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
      $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);

      return $stmt->execute();
    } else {
      return false;
    }
  }

  /**
   * Set the article categories
   * 
   * @param object $conn Connection to the database
   * @param array $ids Category IDs
   * 
   * @return void
   */
  public function setCategories($conn, $ids)
  {

    if ($ids) {
      $sql = "INSERT IGNORE INTO article_category (article_id, category_id) 
              VALUES ";

      $values = [];

      foreach ($ids as $id) {
        $values[] = "({$this->id}, ?)";
      }

      $sql .= implode(", ", $values);

      $stmt = $conn->prepare($sql);

      foreach ($ids as $i => $id) {
        $stmt->bindValue($i + 1, $id, PDO::PARAM_INT);
      }
      $stmt->execute();
    }

    $sql = "DELETE FROM article_category
            WHERE article_id = {$this->id}";

    if ($ids) {
      $placeholders = array_fill(0, count($ids), '?');

      $sql .= " AND category_id NOT IN (" . implode(", ", $placeholders) . ")";
    }

    $stmt = $conn->prepare($sql);

    foreach ($ids as $i => $id) {
      $stmt->bindValue($i + 1, $id, PDO::PARAM_INT);
    }

    $stmt->execute();
  }

  /**
   * Validate the article properties
   * 
   * @param  string $title Title, required.
   * @param  string $content Content, required
   * @param string $published_at Published date and time, required 
   * 
   * @return boolean True if the current properties are valid, false otherwise
   */
  protected function validate()
  {
    if ($this->title === '') {
      $this->errors[] = 'Title is required';
    }
    if ($this->content === '') {
      $this->errors[] = 'Content is required';
    }
    if ($this->published_at === '') {
      $this->errors[] = 'Date is required';
    }

    return empty($this->errors);
  }

  /**
   * Delete the current article
   * 
   * @param object $conn Connection to the database
   * 
   * @return boolean True if the delete was successful, false otherwise
   */
  public function delete($conn)
  {
    $sql = "DELETE FROM article
    WHERE id= :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  /**
   * Insert a new article with its current property values
   * 
   * @param object $conn Connection to the database
   * 
   * @return boolean True if was successful, false otherwise
   */
  public function create($conn)
  {
    if ($this->validate()) {
      $sql = "INSERT INTO article (title, content, published_at)
      VALUES (:title, :content, :published_at)";

      $stmt = $conn->prepare($sql);

      $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
      $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
      $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);

      if ($stmt->execute()) {
        $this->id = $conn->lastInsertId();
        return true;
      }
    } else {
      return false;
    }
  }

  /**
   * Get a count of the total number of records
   * 
   * @param object $conn Connection to the database
   * 
   * @return integer The total number of records
   */
  public static function getTotal($conn)
  {
    return $conn->query('SELECT COUNT(*) FROM article')->fetchColumn();
  }

  /**
   * Update the image file property
   * 
   * @param object $conn Connection to the database
   * @param string $filename The filename of the image file
   * 
   * @return boolean True if it was successful, false otherwise
   */
  public function setImageFile($conn, $filename)
  {
    $sql = "UPDATE article
            SET image_file = :image_file
            WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
    $stmt->bindValue(':image_file', $filename, $filename == null ? PDO::PARAM_NULL : PDO::PARAM_STR);

    return $stmt->execute();
  }
}
