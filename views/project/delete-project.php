<?php
require './../../config.php';
include VIEWS.'/header.php';
//require_once CONTROLLERS.'/student-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once LIB . '/functions.php';
require_once MODELS . '/Database.php';
require_once  MODELS .'/Project.php';



if(isset($_SESSION['project_id'])){
  $project_id = $_SESSION['project_id'];
  $db = Database::getDatabase();
  $p = new Project();
  $count = $p->deleteProject($project_id, $db);

  if($count){
    header("Location: list-projects.php");
  }else {
    "Problem deleting project";
  }

}
