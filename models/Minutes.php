<?php
require_once MODELS . '/Database.php';
class Minutes
{
  private $project_id;
  private $student_id;
  private $minutes_id;
  private $minutes_title;
  private $minutes_description;
  private $db;

  public function __construct($params)
  {
    $this->setPId(isset($params["pId"]) ? $params["pId"] : null);
    $this->setSId(isset($params["sId"]) ? $params["sId"] : null);
    $this->setMId(isset($params["mId"]) ? $params["mId"] : null);
    $this->setTitle(isset($params["title"]) ? $params["title"] : null);
    $this->setDesc(isset($params["desc"]) ? $params["desc"] : null);
    $this->setDb(isset($params["db"]) ? $params["db"] : null);
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

  public function setMId($value)
  {
    $this->minutes_id = $value;
  }

  public function setTitle($value)
  {
    $this->minutes_title = $value;
  }

  public function setDesc($value)
  {
    $this->minutes_description = $value;
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

  public function getMId()
  {
    return $this->minutes_id;
  }

  public function getTitle()
  {
    return $this->minutes_title;
  }

  public function getDesc()
  {
    return $this->minutes_description;
  }

  public function getDb()
  {
    return $this->db;
  }


  public function listMinutes()
  {
    $dbContext = $this->getDb();
    $query = "SELECT DISTINCT m.id, minutes_title, minutes_date, m.project_id FROM minutes m LEFT JOIN projects_students p ON m.project_id = p.project_id WHERE p.project_id = :project_id AND p.student_id = :student_id";
    $stmt = $dbContext->prepare($query);
    $pID = $this->getPId();
    $sID = $this->getSId();
    $stmt->bindParam(":project_id", $pID);
    $stmt->bindParam(":student_id", $sID);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_OBJ);

    return $result;
  }

  public function viewMinutes()
  {
    $dbContext = $this->getDb();
    $query = "SELECT * FROM minutes WHERE id = :minutes_id AND project_id = :project_id";
    $stmt = $dbContext->prepare($query);
    $mID = $this->getMId();
    $pID = $this->getPId();
    $stmt->bindParam(":minutes_id", $mID);
    $stmt->bindParam(":project_id", $pID);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
  }

  public function addMinutes()
  {
    $dbContext = $this->getDb();
    $query = "INSERT INTO minutes (minutes_title, minutes_description, project_id) VALUES (:minutes_title, :minutes_description, :project_id)";
    $stmt = $dbContext->prepare($query);
    $title = $this->getTitle();
    $desc = $this->getDesc();
    $pID = $this->getPId();
    $stmt->bindParam(":minutes_title", $title);
    $stmt->bindParam(":minutes_description", $desc);
    $stmt->bindParam(":project_id", $pID);

    $result = $stmt->execute();
    return $result;
  }

  public function editMinutes()
  {
      $dbContext = $this->getDb();
      $query = "UPDATE minutes SET minutes_title = :minutes_title, minutes_description = :minutes_description WHERE id = :minutes_id";
      $stmt = $dbContext->prepare($query);
      $title = $this->getTitle();
      $desc = $this->getDesc();
      $mID = $this->getMId();
      $stmt->bindParam(":minutes_title", $title);
      $stmt->bindParam(":minutes_description", $desc);
      $stmt->bindParam(":minutes_id", $mID);

      $result = $stmt->execute();

      return $result;
  }

  public function deleteMinutes()
  {
    $dbContext = $this->getDb();
    $query = "DELETE FROM minutes WHERE id = :minutes_id";
    $stmt = $dbContext->prepare($query);
    $mID = $this->getMId();
    $stmt->bindParam(":minutes_id", $mID);

    $result = $stmt->execute();

    return $result;
  }
}
