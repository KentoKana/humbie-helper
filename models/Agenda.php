<?php

class Agenda
{

  public function listAgenda($projectid, $dbContext)
  {
    $query = "SELECT DISTINCT a.id, agenda_title, agenda_date, a.project_id FROM agendas a LEFT JOIN projects_students p ON a.project_id = p.project_id WHERE p.project_id = :projectid AND isArchived = 0";
    $stmt = $dbContext->prepare($query);
    $stmt->bindParam(":projectid", $projectid);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_OBJ);

    return $result;
  }

  public function viewAgenda($agendaid, $projectid, $dbContext)
  {
    $query = "SELECT * FROM agendas WHERE id = :agenda_id AND project_id = :projectid";
    $stmt = $dbContext->prepare($query);
    $stmt->bindParam(":agenda_id", $agendaid);
    $stmt->bindParam(":projectid", $projectid);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
  }

  public function addAgenda($agenda, $agenda_description, $project_id, $dbContext)
  {
    $query = "INSERT INTO agendas (agenda_title, agenda_description, project_id) VALUES (:agenda_title, :agenda_description, :project_id)";
    $stmt = $dbContext->prepare($query);
    $stmt->bindParam(":agenda_title", $agenda);
    $stmt->bindParam(":agenda_description", $agenda_description);
    $stmt->bindParam(":project_id", $project_id);

    $result = $stmt->execute();
    return $result;
  }

  public function editAgenda($agenda_title, $agenda_description, $agenda_id, $dbContext)
  {
      $query = "UPDATE agendas SET agenda_title = :agenda_title, agenda_description = :agenda_description WHERE id = :agenda_id";
      $stmt = $dbContext->prepare($query);
      $stmt->bindParam(":agenda_title", $agenda_title);
      $stmt->bindParam(":agenda_description", $agenda_description);
      $stmt->bindParam(":agenda_id", $agenda_id);

      $result = $stmt->execute();

      return $result;
  }

  public function deleteAgenda($agendaid, $dbContext)
  {
    $query = "UPDATE agendas SET isArchived = 1 WHERE id = :agenda_id";
    $stmt = $dbContext->prepare($query);
    $stmt->bindParam(":agenda_id", $agendaid);

    $result = $stmt->execute();

    return $result;
  }
}
