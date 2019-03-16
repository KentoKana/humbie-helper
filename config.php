<?php
$path = realpath(__DIR__);
// gets the full URL
// reference: https://stackoverflow.com/questions/6768793/get-the-full-url-in-php
// author: ax.
// date accessed: 2019-03-16
$altpath = sprintf("//%s%s",$_SERVER["HTTP_HOST"],$_SERVER["REQUEST_URI"]);

// config files for the app
define('BASE', "$altpath/");
define('CSS', "$altpath/public/stylesheets");
define('IMG', "$altpath/assets");
define('JS', "$altpath/public/js");
define('VIEWS', "$altpath/views");
define('INC', "$path/inc");
define('LIB', "$path/lib");
