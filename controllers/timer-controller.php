<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Had to write the absolute path down. Need to change if not using MAMP.
<<<<<<< HEAD
require_once(realpath(dirname(__DIR__).'/models/Timer.php'));
require_once(realpath(dirname(__DIR__).'/lib/functions.php'));
=======
require_once(realpath(dirname(__DIR__).'\models\Timer.php'));
require_once(realpath(dirname(__DIR__).'\lib\functions.php'));

// require_once(MODELS.'/Timer.php');
// require_once(LIB.'/functions.php');
>>>>>>> 31db54218704959fc0411a495092636b7561fa89

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

<<<<<<< HEAD
    $result = $t->addTimer($time, $studentId);
    if($result)
    {
      echo "success";
    }
=======
    $t->addTimer($time, $studentId, $task, $projectId);
}

if (isset($_POST['delTimeId'])) {
    $t->deleteTime($_POST['delTimeId']);
>>>>>>> 31db54218704959fc0411a495092636b7561fa89
}

?>
