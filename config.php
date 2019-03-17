<?php
$path = realpath(__DIR__);
// gets the full URL
// reference: https://stackoverflow.com/questions/6768793/get-the-full-url-in-php
// author: ax.
// date accessed: 2019-03-16

// $uri = explode("/", $_SERVER["REQUEST_URI"]);
// array_splice($uri, -3);
// $uri = isset($uri[1]) ? $uri[1] : "";


if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
  $uri = explode("\\",$path);
  $uri = $uri[3];
} else {
  $uri = explode("/",$path);
  $uri = $uri[4];
}

$altpath = sprintf("//%s/%s",$_SERVER["HTTP_HOST"], $uri);
// config files for the app
define('BASE', "$altpath/");
define('CSS', "$altpath/public/stylesheets");
define('IMG', "$altpath/assets");
define('JS', "$altpath/public/js");
define('VIEWS', "$path/views");
define('INC', "$path/inc");
define('LIB', "$path/lib");


//
// $path = realpath(__DIR__);
// // gets the full URL
// // reference: https://stackoverflow.com/questions/6768793/get-the-full-url-in-php
// // author: ax.
// // date accessed: 2019-03-16
// $uri = explode("\\",$path);
// $altpath = sprintf("//%s/%s",$_SERVER["HTTP_HOST"],$uri[3]);
// // config files for the app
// define('BASE', "$altpath/");
// define('CSS', "$altpath/public/stylesheets");
// define('IMG', "$altpath/assets");
// define('JS', "$altpath/public/js");
// define('VIEWS', "$path/views");
// define('INC', "$path/inc");
// define('LIB', "$path/lib");
