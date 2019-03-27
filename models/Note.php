<?php
require_once('Database.php');

class Note
{
  public function addNote($project_id, $student_id, $notes_title, $notes_content, $db)
  {
    $sql= "INSERT INTO notes (project_id, student_id, notes_title, notes_content)
    VALUES (:project_id, :student_id, :notes_title, :notes_content)";
    $pst = $db->prepare($sql);

    $pst->bindParam(':project_id', $project_name);
    $pst->bindParam(':studnt_id', $student_name);
    $pst->bindParam(':notes_title', $notes_title);
    $pst->bindParam(':notes_content', $notes_content);

    $count = $pst->execute();
    return $count;
  }
  public function editNote($note_id, $note_name, )

  public function listNotes($project_id, $db)
  {
    $sql = "SELECT * FROM notes
    join projects ON projects.id = notes.project_id
    WHERE projects.id = :project_id"

    $pst = $db->prepare($sql);

    $pst->bindParam(':project_id', $project_id);
    $pst->execute();
    $n = $pst->fetchAll(PDO::FETCH_OBJ);
    return $n;
  }

  public function getNote($note_id, $db)
  {
    $sql = "SELECT * FROM notes
            WHERE id=:project_id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':project_id', $note_id);
    $n = $pst-> fetchAll(PDO::FETCH_OBJ);
    return $n;
  }

}

 ?>
