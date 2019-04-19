<?php
class Agenda
{
  private $project_id;
  private $student_id;
  private $agendas_id;
  private $agendas_title;
  private $agendas_description;
  private $db;

  public function __construct($params)
  {
    $this->setPId(isset($params["pId"]) ? $params["pId"] : null);
    $this->setAId(isset($params["aId"]) ? $params["aId"] : null);
    $this->setTitle(isset($params["title"]) ? $params["title"] : null);
    $this->setDesc(isset($params["desc"]) ? $params["desc"] : null);
    $this->setDesc(isset($params["db"]) ? $params["db"] : null);
  }

  // set
  public function setPId($value)
  {
    $this->project_id = $value;
  }

  public function setSId($value)
  {
    $this->student_id = $value;
  }

  public function setAId($value)
  {
    $this->agendas_id = $value;
  }

  public function setTitle($value)
  {
    $this->agendas_title = $value;
  }

  public function setDesc($value)
  {
    $this->agendas_description = $value;
  }

  public function setDb($value)
  {
    $this->db = $value;
  }

  // get
  public function getPId()
  {
    return $this->project_id;
  }

  public function getSId()
  {
    return $this->student_id;
  }

  public function getAId()
  {
    return $this->agendas_id;
  }

  public function getTitle()
  {
    return $this->agendas_title;
  }

  public function getDesc()
  {
    return $this->agendas_description;
  }

  public function getDb()
  {
    return $this->db;
  }


  public function listAgenda()
  {
    $dbContext = $this->getDb();
    $query = "SELECT DISTINCT a.id, agendas_title, agendas_date, a.project_id FROM agendas a LEFT JOIN projects_students p ON a.project_id = p.project_id WHERE p.project_id = :project_id AND p.student_id = :student_id";
    $stmt = $dbContext->prepare($query);
    $pID = $this->getPId();
    $sID = $this->getSId();
    $stmt->bindParam(":project_id", $pID);
    $stmt->bindParam(":student_id", $sID);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_OBJ);

    return $result;
  }

  public function viewAgenda()
  {
    $dbContext = $this->getDb();
    $query = "SELECT * FROM agendas WHERE id = :agendas_id AND project_id = :project_id";
    $stmt = $dbContext->prepare($query);
    $aID = $this->getmId();
    $pID = $this->getPId();
    $stmt->bindParam(":agendas_id", $aID);
    $stmt->bindParam(":project_id", $pID);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
  }

  public function addAgenda()
  {
    $dbContext = $this->getDb();
    $query = "INSERT INTO agendas (agendas_title, agendas_description, project_id) VALUES (:agendas_title, :agendas_description, :project_id)";
    $stmt = $dbContext->prepare($query);
    $title = $this->getTitle();
    $desc = $this->getDesc();
    $pID = $this->getPId();
    $stmt->bindParam(":agendas_title", $title);
    $stmt->bindParam(":agendas_description", $desc);
    $stmt->bindParam(":project_id", $pID);

    $result = $stmt->execute();
    return $result;
  }

  public function editAgenda()
  {
      $dbContext = $this->getDb();
      $query = "UPDATE agendas SET agendas_title = :agendas_title, agendas_description = :agendas_description WHERE id = :agendas_id";
      $stmt = $dbContext->prepare($query);
      $title = $this->getTitle();
      $desc = $this->getDesc();
      $aID = $this->getMId();
      $stmt->bindParam(":agendas_title", $title);
      $stmt->bindParam(":agendas_description", $desc);
      $stmt->bindParam(":agendas_id", $aID);

      $result = $stmt->execute();

      return $result;
  }

  public function deleteAgenda()
  {
    $dbContext = $this->getDb();
    $query = "DELETE FROM agendas WHERE id = :agendas_id";
    $stmt = $dbContext->prepare($query);
    $aID = $this->getmId();
    $stmt->bindParam(":agendas_id", $aID);

    $result = $stmt->execute();

    return $result;
  }
}
