<?php

require_once 'config/config.php';

spl_autoload_register(function ($className) {
  $classPath = '';
  if (strpos($className, 'Dao') !== false) {
    $classPath = 'dao/';
  } else {
    $classPath = 'libraries/';
  }

  require_once $classPath . $className . '.php';
});
