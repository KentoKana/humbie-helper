<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
//     require_once(realpath(dirname(__DIR__).'\models\Timer.php'));
//     require_once(realpath(dirname(__DIR__).'\lib\functions.php'));
// } else {
//     require_once(MODELS.'/Timer.php');
//     require_once(LIB.'/functions.php');
// }

require_once($_SERVER['DOCUMENT_ROOT'] . '/models/Timer.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/functions.php');


$t = new Timer(Database::getDatabase());

if(isset($_POST['time'])) {
    $t->setTime($_POST['time']);
    $t->setStudentId($_POST['studentId']);
    $t->setTask($_POST['taskName']);
    $t->setProjectId($_POST['projectId']);

    $time = $t->getTime();
    $studentId = $t->getStudentId();
    $task = $t->getTask();
    $projectId = $t->getProjectId();

    $t->addTimer($time, $studentId, $task, $projectId);
}

if (isset($_POST['delTimeId'])) {
    $t->deleteTime($_POST['delTimeId']);
}

?>
