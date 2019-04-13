<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once MODELS . '/announcement_db.php';
$studentId = $_SESSION['studentId'];
$projectId = $_SESSION['project_id'];

// $studentId = (int)$student_id;
// $projectId = (int)$project_id;

$db = Database::getDatabase();
$a = new Announcement();
$myAnnounce = $a->getAllAnnouncements(Database::getDatabase());
$annouceById = $a->getAnnouncementById(filter_input(INPUT_GET, 'id'), Database::getDatabase());

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$announcement = filter_input(INPUT_POST, 'announcement', FILTER_SANITIZE_STRING);
$announcementTime = date("Y-m-d H:i:s");

//Adding New Annoucement
if (isset($_POST['addAnnounce'])) {
    $count = $a->addAnnouncement($announcementTime, $announcement, $studentId, $projectId, $db);
    if($count){
        header('Location:' . RVIEWS . '/project/project-details.php');
    } else {
        echo "Problem Annoucing.";
    }
}
//Udate Existing Annoucemenmt
if (isset($_POST['editAnnouncement'])) {
    $count = $a->editAnnouncement($id, $announcementTime, $announcement, $studentId, $projectId, $db);
    if($count){
        header('Location:' . RVIEWS . '/project/project-details.php');
    } else {
        echo "Problem editing announcement.";
  }
}
//Deleting Annoucement
if (isset($_POST['deleteAnnouncement'])) {
    $count = $a->deleteAnnouncement($id, $db);
    if($count){
        header('Location:' . RVIEWS . '/project/project-details.php');
    } else {
        echo "There was a problem deleting quote.";
    }
}