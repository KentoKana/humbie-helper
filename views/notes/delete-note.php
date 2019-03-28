<?php
require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/note-controller.php';



if(isset($_SESSION['note_id'])){
  $note_id = $_SESSION['note_id'];

  $count = $n->deleteNote($note_id, $db);

  if($count){
    header("Location: list-notes.php");
  }else {
    "Problem deleting note";
  }

}
