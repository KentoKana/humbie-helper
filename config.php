<?php
session_start();
$path = realpath(__DIR__);

//extract the base folder from base url
$base = basename($path);

// gets the full URL
// reference: https://stackoverflow.com/questions/6768793/get-the-full-url-in-php
// author: ax.
// date accessed: 2019-03-16

$altpath = sprintf("//%s/%s",$_SERVER["HTTP_HOST"], $base);
// config files for the app
define('BASE', "$altpath/");
define('CSS', "$altpath/public/stylesheets");
define('IMG', "$altpath/assets");
define('JS', "$altpath/public/js");
define('MODELS', "$path/models");
define('VIEWS', "$path/views");
define('CONTROLLERS', "$path/controllers");
define('INC', "$path/inc");
define('LIB', "$path/lib");
