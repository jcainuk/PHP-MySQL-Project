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
   * @param string $username Username
   * @param string $password Password
   * 
   * @return boolean True if the credentials are correct, false otherwise
   */
  public static function authenticate($username, $password)
  {
    return $username === 'jonathan' && $password === 'secret';
  }
}
