<?php

spl_autoload_register(function ($namespace) {
  $classname = preg_replace("/(\/|\\\\)/", DIRECTORY_SEPARATOR, $namespace);
  $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . $classname . '.php';

  if (!file_exists($filename)) throw new LogicException("Class not found");

  require_once $filename;
});
