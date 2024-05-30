<?php

/**
 * Get the database connection.
 * 
 * @return object Connection to a MySQL server.
 */

function getDb()
{
  // Credentials
  $db_host = "localhost";
  $db_name = "cms";
  $db_user = "cms_www";
  $db_pass = "CpGIIO(bYdn248HU";

  // Save connection to database
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

  // Check if not connected
  if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
  }

  return $conn;
}
