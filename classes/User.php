<?php

/**
 * User
 * 
 * A person or entity that can log into the site
 */
class User
{
  /**
   * Unique identifier
   * @var integer
   */
  public $id;
  /**
   * Unique username
   * @var string
   */
  public $username;
  /**
   * Password
   * @var string
   */
  public $password;

  /**
   * Authenticate a user by username and password
   * 
   * @param object $conn Connection to the database
   * @param string $username Username
   * @param string $password Password
   * 
   * @return boolean True if the credentials are correct, null otherwise
   */
  public static function authenticate($conn, $username, $password)
  {
    $sql = "SELECT *
            FROM user
            WHERE username = :username";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

    $stmt->execute();

    if ($user = $stmt->fetch()) {
      return password_verify($password, $user->password);
    }
  }
}
