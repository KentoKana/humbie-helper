<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$path = $_SERVER['DOCUMENT_ROOT'];

//extract the base folder from base url
$base = basename($path);

// gets the full URL
// reference: https://stackoverflow.com/questions/6768793/get-the-full-url-in-php
// author: ax.
// date accessed: 2019-03-16

$altpath = sprintf("https://%s",$_SERVER["HTTP_HOST"]);

// config files for the app
define('BASE', "/");
define('CSS', "$altpath/public/stylesheets");
define('IMG', "$altpath/assets");
define('JS', "$altpath/public/js");
define('MODELS', "$path/models");
define('RMODELS', "$altpath/models");
define('VIEWS', "$path/views");
define('RVIEWS', "$altpath/views");
define('CONTROLLERS', "$path/controllers");
define('INC', "$path/inc");
define('LIB', "$path/lib");
