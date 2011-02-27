<?php

// Start output buffering
ob_start();

// Set the error reporting
error_reporting(E_ALL | E_STRICT);

// Set up the include paths
$libraryPath = dirname(dirname(__FILE__) . '/..');
$testsPath = $libraryPath . '/tests';
set_include_path(implode(PATH_SEPARATOR, array($libraryPath, $testsPath, get_include_path())));

// Setup the autoloader
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('Noginn_');

unset($libraryPath, $testsPath);
