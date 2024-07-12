<?php

/**
 * Initialisations
 * 
 * Register an autoloader, start or resume the sessions etc.
 */
spl_autoload_register(
  function ($class) {
    require dirname(__DIR__) . "/classes/{$class}.php";
  }
);

session_start();

require dirname(__DIR__) . '/config.php';
