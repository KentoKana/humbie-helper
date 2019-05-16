<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(MODELS.'/Note.php');
require_once(LIB. '/functions.php');

$db = Database::getDatabase();
$n = new Note();
$errormsg = "";

// controller file that writes all the logic for the view pages and grabs the required information from the models

// Grabbing the project_id session if it is set
$_SESSION['project_id'];
$project_id = $_SESSION['project_id'];

//Logic for adding a new note

if(isset($_POST['addNote'])){
  $note_title = $_POST['note_title'];
  $note_content = $_POST['editor1'];
  $student_id = $_SESSION['studentId'];
  $project_id = $_SESSION['project_id'];

  if(empty($note_title)|| empty($note_content)){
    $errormsg .= "You cannot have empty fields. Please fill in the
    all fields and try again";
  }else{
    $c = $n->addNote($project_id, $student_id, $note_title, $note_content, $db);
    if($c){
      header('Location:list-notes.php');
    }else{
      $errormsg .= "Error adding note, please try again later.";
    }
  }
}

// Logic for a user to edit a note and save the info back to the database.

if(isset($_POST['editNote'])){
  $note_id = $_SESSION['note_id'];
  $note_title = $_POST['note_title'];
  $note_content = $_POST['editor1'];

  if(empty($note_title)|| empty($note_content)){
    $errormsg .= "You cannot have empty fields. Please fill in the
    all fields and try again";
  }else{
    $c = $n->editNote($note_id, $note_title, $note_content, $db);
    if($c){
      header('Location:list-notes.php');
    }else{
      echo "Error adding note";
    }
  }
}

//function to list all notes associated with a project

$notes= $n->listNotes($project_id, $db);


// after all notes are listed these are the options you can do with each note: edit a note, view a note or delete a note.
if(isset($_POST['edit'])){
  $_SESSION['note_id'] = $_POST['note_id'];
  header('Location:edit-note.php');
}

if(isset($_POST['view'])){
  $_SESSION['note_id'] = $_POST['note_id'];
  header('Location:view-note.php');
}

  if(isset($_POST['delete'])){
    $_SESSION['note_id'] = $_POST['note_id'];
    header('Location:delete-note.php');
  }

 ?>
