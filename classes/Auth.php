<?php

/**
 * Authentication
 * 
 * Login and logout
 */
class Auth
{
  /**
   * Return the user authentication status
   * 
   * @return boolean True if a user is logged in, false otherwise
   */
  public static function isLoggedIn()
  {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
  }

  /**
   * Require the user to be logged in, stopping with an unauthorised message if not
   * 
   * @return void
   */
  public static function requireLogin()
  {
    if (!static::isLoggedIn()) {
      die("unauthorised");
    }
  }
}
