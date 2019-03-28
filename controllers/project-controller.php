<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(MODELS.'/Project.php');
require_once(LIB. '/functions.php');

$db = Database::getDatabase();
$project = new Project();
$errormsg = "";

// Logic for adding a student
  if(isset($_POST['addProj'])){
    $project_name = $_POST['project-name'];
    $project_description = $_POST['project-description'];
    $student_id = $_SESSION['studentId'];
    $c = $project->addProject($project_name, $project_description, $student_id, $db);
    if($c){
      header('Location:project-details.php');
    }else{
      echo "Error adding project";
    }
  }

// Logic for editing a project

  if(isset($_POST['updateProj'])){
    $project_id = $_SESSION['project_id'];
    $edit_name = $_POST['edit-name'];
    $edit_description = $_POST['edit-description'];
    $count = $project->editProject($project_id, $edit_name, $edit_description, $db);
    if($count){
      header('Location:project-details.php');
    }else{
      echo "Error adding project";
    }
  }

//Logic for adding students to a project
if(isset($_POST['addStudents'])){
  $project_id = $_SESSION['project_id'];
  $student_id = $_POST['student_id'];
  foreach($student_id as $s_id){
    $c = $project->addStudentsToProject($project_id,$s_id, $db);
  }
  if($c){
    header('Location:project-details.php');
  }else{
    $errormsg .= "That student is already in the project";
    return $errormsg;
  }

//var_dump ($student_id);

}





 ?>
