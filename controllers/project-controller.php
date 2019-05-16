<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once LIB . '/functions.php';
require_once MODELS . '/Database.php';
require_once  MODELS .'/Project.php';

$db = Database::getDatabase();
$project = new Project();
$errormsg = "";


// Logic for creating a new project.
  if(isset($_POST['addProj'])){
    $project_name = $_POST['project-name'];
    $project_description = $_POST['project-description'];
    $student_id = $_SESSION['studentId'];

    if(empty($project_name) || empty($project_description)){
      $errormsg .= "You cannot have any empty fields. Please fill
      in all fields and try again";
    }else{
      $c = $project->addProject($project_name, $project_description, $student_id, $db);
      if($c){
        //Sets project_id session to the last inserted id.
        //Kento's edit - March 29 2019;
        $_SESSION['project_id'] = Database::getDatabase()->lastInsertId();;
        header('Location:project-details.php');
      }else{
        $errormsg.= "Error adding this project, please try again.";
      }
    }
  }

// Logic for editing a project

  if(isset($_POST['updateProj'])){
    $project_id = $_SESSION['project_id'];
    $edit_name = $_POST['edit-name'];
    $edit_description = $_POST['edit-description'];

    if(empty($edit_name) || empty($edit_description)){
      $errormsg .= "You cannot have any empty fields. Please fill
      in all fields and try again";
    }else{
      $count = $project->editProject($project_id, $edit_name, $edit_description, $db);
      if($count){
        header('Location:project-details.php');
      }else{
        echo "Error adding project";
      }
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

// logic for the list projects page to allow students to pick an option on the table --> edit, view details or delete
if(isset($_POST['edit'])){
    $_SESSION['project_id'] = $_POST['project_id'];
    header('Location:'.RVIEWS.'/project/edit-project.php');
  }

  if(isset($_POST['details'])){
    $_SESSION['project_id'] = $_POST['project_id'];
    header('Location:'.RVIEWS. '/project/project-details.php');
  }

  if(isset($_POST['delete'])){
    $_SESSION['project_id'] = $_POST['project_id'];
    header('Location:'.RVIEWS.'/project/delete-project.php');
  }



 ?>
