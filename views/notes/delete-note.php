<?php
require './../../config.php';
require_once CONTROLLERS.'/note-controller.php';

// logic for deleteing a note

if(isset($_SESSION['note_id'])){
  $note_id = $_SESSION['note_id'];

  $count = $n->deleteNote($note_id, $db);

  if($count){
    header("Location: list-notes.php");
  }else {
    "Problem deleting note";
  }

}

require_once VIEWS . '/header.php';
