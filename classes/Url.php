<?php

/**
 * URL
 * 
 * Response methods
 */
class Url
{
  /**
   * Redirect to another URL on the same site
   * 
   * @param string $path  The path to redirect to
   * 
   * @return void
   */
  public static function redirect($path)
  { // Check if server is using http or https
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
      $protocol = 'https';
    } else {
      $protocol = 'http';
    }

    // redirect to an absolute url 
    header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . $path);

    exit;
  }
}
