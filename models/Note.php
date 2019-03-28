<?php
require_once('Database.php');

class Note
{
  // function to add a note to the database
  public function addNote($project_id, $student_id, $notes_title, $notes_content, $db)
  {
    $sql= "INSERT INTO notes (project_id, student_id, notes_title, notes_content)
    VALUES (:project_id, :student_id, :notes_title, :notes_content)";

    $pst = $db->prepare($sql);

    $pst->bindParam(':project_id', $project_id);
    $pst->bindParam(':student_id', $student_id);
    $pst->bindParam(':notes_title', $notes_title);
    $pst->bindParam(':notes_content', $notes_content);

    $count = $pst->execute();
    return $count;
  }

  //function to allow user to edit a note from the database
  public function editNote($note_id, $notes_title, $notes_content, $db)
  {
    $sql = "UPDATE notes
          set notes_title = :notes_title,
          notes_content = :notes_content
          WHERE id = :note_id";

    $pst = $db->prepare($sql);
    $pst->bindParam(':notes_title', $notes_title);
    $pst->bindParam(':notes_content', $notes_content);
    $pst->bindParam(':note_id', $note_id);
    $count = $pst->execute();
    return $count;
  }

  // function to allow users to see all notes associated with a project
  public function listNotes($project_id, $db)
  {
    $sql = "SELECT notes.id, notes_title, notes_date, notes_content FROM notes
    join projects ON projects.id = notes.project_id
    WHERE projects.id = :project_id";

    $pst = $db->prepare($sql);

    $pst->bindParam(':project_id', $project_id);
    $pst->execute();
    $n = $pst->fetchAll(PDO::FETCH_OBJ);
    return $n;
  }

  //function to allow users to view a specific note
  public function getNote($note_id, $db)
  {
    $sql = "SELECT * FROM notes
            WHERE id=:note_id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':note_id', $note_id);
    $pst->execute();
    $n = $pst-> fetch(PDO::FETCH_OBJ);
    return $n;
  }

// function to let users delete a note
  public function deleteNote($note_id, $db)
  {
    $sql = "DELETE FROM notes
            WHERE id=:note_id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':note_id', $note_id);
    $count = $pst->execute();
    return $count;
  }

}

 ?>
