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
}
