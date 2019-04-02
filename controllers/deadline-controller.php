<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(MODELS.'/Deadline.php');
require_once(LIB. '/functions.php');

$db = Database::getDatabase();
$d = new Deadline($db);


if(isset($_POST['addDeadline'])){
    $d->setName($_POST['deadlineName']);
    $d->setDate($_POST['deadlineDate']);
    $d->setDescription($_POST['deadlineDesc']);

    $name = $d->getName();
    $date = $d->getDate();
    $desc = $d->getDescription();

    $d->addDeadline($name, $date, $desc, $_SESSION['project_id']);
    
    header('Location:' . RVIEWS . '/project/project-details.php');

}


if(isset($_POST['editDeadline'])){
  $d->setName($_POST['deadlineName']);
  $d->setDate($_POST['deadlineDate']);
  $d->setDescription($_POST['deadlineDesc']);
  $name = $d->getName();
  $date = $d->getDate();
  $description = $d->getDescription();
  $id=$_SESSION['deadlineId'];
  $d->updateDeadline($name, $date, $description, $id);
  header('Location:' . RVIEWS . '/project/project-details.php');

}

if(isset($_POST['delDeadline'])){

  $d->delDeadline($_POST['deadlineId']);

}

?>