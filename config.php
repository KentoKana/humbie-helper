<?php
$path = realpath(__DIR__);
// $altpath= "http://localhost/project-backstreet-boys-and-jenna";
$altpath= "http://localhost/";
//Had to use this path instead - Kento.

// uncomment if you are using port 8080
// $altpath= "http://localhost:8080/project-backstreet-boys-and-jenna";

// config files for the app
define('BASE', "$altpath\\");
define('CSS', "$altpath\public\stylesheets");
define('IMG', "$altpath\assets");
define('JS', "$altpath\public\js");
define('VIEWS', "$path\\views");
define('INC', "$path\inc");
define('LIB', "$path\lib");
