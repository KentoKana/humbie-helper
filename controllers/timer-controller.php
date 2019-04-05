<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Had to write the absolute path down. Need to change if not using MAMP.
require_once('C:\MAMP\htdocs\project-backstreet-boys-and-jenna\models\Timer.php');
require_once('C:\MAMP\htdocs\project-backstreet-boys-and-jenna\lib\functions.php');

// require_once(MODEL.'\Timer.php');
// require_once(LIB.'\functions.php');

$t = new Timer(Database::getDatabase());

if(isset($_POST['time'])) {
    $t->setTime($_POST['time']);
    $t->setStudentId($_POST['studentId']);

    $time = $t->getTime();
    $studentId = $t->getStudentId();

    $t->addTimer($time, $studentId);
}

?>