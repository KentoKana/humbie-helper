<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(MODELS.'/Note.php');
require_once(LIB. '/functions.php');

$db = Database::getDatabase();
$n = new Note();

//Logic for adding a new note

if(isset($_POST['addNote'])){
  $note_title = $_POST['note_title'];
  $note_content = $_POST['editor1'];
  $student_id = $_SESSION['studentId'];
  $project_id = $_SESSION['project_id'];
  $c = $n->addNote($project_id, $student_id, $note_title, $note_content, $db);
  if($c){
    header('Location:list-notes.php');
  }else{
    echo "Error adding note";
  }
}

// Logic for a user to edit a note and save the info back to the database.

if(isset($_POST['editNote'])){
  $note_id = $_SESSION['note_id'];
  $note_title = $_POST['note_title'];
  $note_content = $_POST['editor1'];
  $c = $n->editNote($note_id, $note_title, $note_content, $db);
  if($c){
    header('Location:list-notes.php');
  }else{
    echo "Error adding note";
  }
}

//function to list all notes associated with a project

$notes

 ?>
