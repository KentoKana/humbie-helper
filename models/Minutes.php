<?php
require_once MODELS . '/Database.php';
class Minutes
{
  private $project_id;
  private $minutes_id;
  private $minutes_title;
  private $minutes_description;

  public function __construct($params)
  {
    $this->setPId(isset($params["pId"]) ? $params["pId"] : null);
    $this->setMId(isset($params["mId"]) ? $params["mId"] : null);
    $this->setTitle(isset($params["title"]) ? $params["title"] : null);
    $this->setDesc(isset($params["desc"]) ? $params["desc"] : null);
  }

  // set
  public function setPId($value)
  {
    $this->project_id = $value;
  }

  public function setmId($value)
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

  // get
  public function getPId()
  {
    return $this->project_id;
  }

  public function getmId()
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


  public function listMinutes()
  {
    $dbContext = Database::getDatabase();
    $query = "SELECT DISTINCT m.id, minutes_title, minutes_date, m.project_id FROM minutes m LEFT JOIN projects_students p ON m.project_id = p.project_id WHERE p.project_id = :project_id";
    $stmt = $dbContext->prepare($query);
    $pID = $this->getPId();
    $stmt->bindParam(":project_id", $pID);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_OBJ);

    return $result;
  }

  public function viewMinutes()
  {
    $dbContext = Database::getDatabase();
    $query = "SELECT * FROM minutes WHERE id = :minutes_id AND project_id = :project_id";
    $stmt = $dbContext->prepare($query);
    $mID = $this->getmId();
    $pID = $this->getPId();
    $stmt->bindParam(":minutes_id", $mID);
    $stmt->bindParam(":project_id", $pID);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
  }

  public function addMinutes()
  {
    $dbContext = Database::getDatabase();
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
      $dbContext = Database::getDatabase();
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
    $dbContext = Database::getDatabase();
    // $query = "UPDATE minutes SET isArchived = 1 WHERE id = :minutes_id";
    $query = "DELETE FROM minutes WHERE id = :minutes_id";
    $stmt = $dbContext->prepare($query);
    $mID = $this->getmId();
    $stmt->bindParam(":minutes_id", $mID);

    $result = $stmt->execute();

    return $result;
  }
}
