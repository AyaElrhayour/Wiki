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

require_once "models/category.php";
require_once "models/tag.php";
require_once "models/wiki.php";
require_once "models/wiki_tag.php";
require_once "helpers/redirect.php";
