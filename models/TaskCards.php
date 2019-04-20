<?php
require_once('Database.php');
class TaskCards
{
    private $studentId;
    private $projectId;
    private $taskCardName;
    private $taskCardDescription;
    private $taskCardIndex;
    private $taskId;
    private $taskCardID;
    private $sortParam;
    private $db;

    // this will set the parameters then the class is colled
    public function __construct($params)
    {
      $this->setStudentId(isset($params['studentId']) ? $params['studentId'] : null);
      $this->setProjectId(isset($params['projectId']) ? $params['projectId'] : null);
      $this->setTCName(isset($params['tcName']) ? $params['tcName'] : null);
      $this->setTCDesc(isset($params['tcDesc']) ? $params['tcDesc'] : null);
      $this->setTCIndex(isset($params['tcIndex']) ? $params['tcIndex'] : null);
      $this->setTaskId(isset($params['tId']) ? $params['tId'] : null);
      $this->setTCId(isset($params['tcId']) ? $params['tcId'] : null);
      $this->setSortParam(isset($params['sort']) ? $params['sort'] : null);
      $this->setDb(isset($params['db']) ? $params['db'] : Database::getDatabase());
    }

    public function setStudentId($value)
    {
      $this->projectId = $value;
    }

    public function setProjectId($value)
    {
      $this->projectId = $value;
    }

    public function setDb($value)
    {
      $this->db = $value;
    }

    public function setTCName($value)
    {
      $this->taskCardName = $value;
    }

    public function setTCDesc($value)
    {
      $this->taskCardDescription = $value;
    }

    public function setTCIndex($value)
    {
      $this->taskCardIndex = $value;
    }

    public function setTCId($value)
    {
      $this->taskCardId = $value;
    }

    public function setTaskId($value)
    {
      $this->taskId = $value;
    }

    public function setSortParam($value)
    {
      $this->sortParam = $value;
    }

    public function getStudentId()
    {
      return $this->projectId;
    }

    public function getProjectId()
    {
      return $this->projectId;
    }

    public function getDb()
    {
      return $this->db;
    }

    public function getTCName()
    {
      return $this->taskCardName;
    }

    public function getTCDesc()
    {
      return $this->taskCardDescription;
    }

    public function getTCIndex()
    {
      return $this->taskCardIndex;
    }

    public function getTCId()
    {
      return $this->taskCardId;
    }

    public function getTaskId()
    {
      return $this->taskId;
    }

    public function getSortParam()
    {
      return $this->sortParam;
    }

    public function getLastTask()
    {
      $dbcon = $this->getDb();
      $query = "SELECT * FROM tasklists WHERE id = (SELECT MAX(id) from tasklists)";
      $preparedStatement = $dbcon->prepare($query);
      $preparedStatement->execute();
      $result = $preparedStatement->fetchAll(PDO::FETCH_OBJ);

      return $result;
    }

    public function getLastCard()
    {
      $dbcon = $this->getDb();
      $query = "SELECT c.id, tc.id as tcId, card_name, card_description, card_index FROM cards c JOIN task_cards tc on c.id = tc.card_id WHERE c.id = (SELECT MAX(id) from cards)";
      $preparedStatement = $dbcon->prepare($query);
      $preparedStatement->execute();
      $result = $preparedStatement->fetchAll(PDO::FETCH_OBJ);

      return $result;
    }

    public function getCardCount()
    {
      $dbcon = $this->getDb();
      $query = "SELECT MAX(id) FROM cards";
      $preparedStatement = $dbcon->prepare($query);
      $preparedStatement->execute();
      $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

      return intval($result[0]["MAX(id)"]);
    }

    public function getTaskCount()
    {
      $dbcon = $this->getDb();
      $query = "SELECT MAX(id) FROM tasklists";
      $preparedStatement = $dbcon->prepare($query);
      $preparedStatement->execute();
      $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

      return intval($result[0]["MAX(id)"]);
    }

    public function getAllTasks()
    {
        $dbcon = $this->getDb();
        $query = "SELECT * FROM tasklists WHERE project_id = :projectId";
        $p_id = $this->getProjectId();
        $preparedStatement = $dbcon->prepare($query);
        $preparedStatement->bindParam(":projectId", $p_id);
        $preparedStatement->execute();
        $result = $preparedStatement->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function generateTasks()
    {
        $taskList = "";
        $dbcon = $this->getDb();
        $myTasks = $this->getAllTasks();
        $ctr = 1;
        $taskList .= "<div class='tasklist'>";
        // echo "<pre>";
        // print_r($this->getLastCard());
        // echo "</pre>";
        foreach($myTasks as $task => $t)
        {
            $taskList .= "<div class='tasklist__wrapper'>";
            $taskList .= "<div class='tasklist__header'>";
            $taskList .= sprintf("<div class='tasklist__title'><h2>%s:</h2></div>", $t->task_name);
            $taskList .= "</div>";
            $taskList .= sprintf("<div class='tasklist__body tasklist__nested' id='taskListNested%s' data-task='%d'>", $t->task_index, $t->id);
            $taskList .= $this->generateCards($this->getAllCards($t->id));
            $taskList .= "</div>";
            $taskList .= "<div class='tasklist__footer'>";
            if($ctr == 1){
                $cardID = $this->getCardCount() + 1;
                $taskList .= sprintf("<button type='button' name='new_card' id='newCard' class='jg-button-primary' value='%d' data-toggle='modal' data-target='#addTaskCard' data-title='Add Card'>Add new card</button>", $cardID);
            }
            $taskList .= "</div></div>";

            // increase counter
            $ctr++;
        }
        //get the last task id
        $taskId = $this->getTaskCount() + 1;
        $taskList .= "</div>";
        $taskOpt = sprintf('<div class="task-options"><button type="button" name="addTask" id="newTaskList" class="btn btn-success" value="%d" data-toggle="modal" data-target="#addTaskCard" data-title="Add Task">Add a Task List</button></div>', $taskId);
        $taskList = $taskOpt . $taskList;
        return $taskList;
    }

    public function getAllCards($taskId)
    {
        $dbcon = $this->getDb();
        $query = "SELECT * FROM cards LEFT JOIN task_cards ON cards.id = task_cards.card_id WHERE task_id = :taskId ORDER BY card_index";
        $prepare = $dbcon->prepare($query);
        $prepare->bindParam(':taskId', $taskId);
        $prepare->execute();

        $result = $prepare->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function generateCards($cards)
    {
        $cardList = "";
        foreach($cards as $card => $c)
        {
            $cardList .= sprintf("<div class='task-card' data-id='%d' data-cidx='%d' data-cid='%d'>", $c->id, $c->card_index, $c->card_id);
            $cardList .= sprintf("<div class='card__title'>%s</div>", $c->card_name);
            $cardList .= sprintf("<div class='card__description'>%s</div>", $c->card_description);
            $cardList .= "</div>";
        }
        return $cardList;
    }

    public function addTask()
    {
      $dbcon = $this->getDb();
      $addQuery = "INSERT INTO tasklists (task_name, task_description, task_index, project_id) VALUES (:task_name, :task_desc, :task_index, :project_id)";
      $prepare = $dbcon->prepare($addQuery);

      $tn = $this->getTCName();
      $td = $this->getTCDesc();
      $tIdx = $this->getTCIndex();
      $pId = $this->getProjectId();

      $prepare->bindParam(":task_name", $tn);
      $prepare->bindParam(":task_desc", $td);
      $prepare->bindParam(":task_index", $tIdx);
      $prepare->bindParam(":project_id", $pId);

      $result = $prepare->execute();
      $task = "";

      if($result)
      {
        $task = $this->getLastTask();
      }
      else
      {
        $task = false;
      }

      return $task;
    }

    public function addCard()
    {
      $dbcon = $this->getDb();
      $addQuery = "INSERT INTO cards (card_name, card_description, card_index) VALUES (:card_name, :card_desc, :card_index)";
      $bridgeQuery = "INSERT INTO task_cards (task_id, card_id) VALUES (:task_id, (SELECT MAX(id) from cards))";

      // retrieve the opjects
      $tn = $this->getTCName();
      $td = $this->getTCDesc();
      $tcIdx = $this->getTCIndex();
      $tId = $this->getTaskId();

      //prepare the statements
      $prepareAdd = $dbcon->prepare($addQuery);

      //bind parameters
      $prepareAdd->bindParam(':card_name', $tn);
      $prepareAdd->bindParam(':card_desc', $td);
      $prepareAdd->bindParam(':card_index', $tcIdx);

      // execute the queries
      $add = $prepareAdd->execute();

      // prepare the bridging table statement
      $prepareBridge = $dbcon->prepare($bridgeQuery);

      // bind parameter for the bridging table
      $prepareBridge->bindParam(':task_id', $tId);
      //execute
      $bridge = $prepareBridge->execute();

      $newCard = "";

      // check if successful
      if($add && $bridge)
      {
        $newCard = $this->getLastCard();
      }
      else
      {
        $newCard = false;
      }

      return $newCard;
    }

    public function saveSort()
    {
      $dbcon = $this->getDb();
      $results = [];
      $tId = $tcId = 0;
      $params = $this->getSortParam();

      // bulk update rows using PDO
      // reference: https://stackoverflow.com/questions/26959784/pdo-php-the-fastest-way-to-update-or-insert-multiple-rows
      $sort_query = "UPDATE cards SET card_index = :card_index WHERE id = :card_id";
      $sort_bridge = "UPDATE task_cards SET task_id = :task_id WHERE id = :task_cards_id";

      $prepareQuery = $dbcon->prepare($sort_query);
      $prepareBridge = $dbcon->prepare($sort_bridge);
      if($params)
      {
        foreach ($params as $key => $value)
        {
          try
          {
            // store and execute

            //prepare statement
            $prepareQuery->bindParam(":card_index", $value['cardIndex']);
            $prepareQuery->bindParam(":card_id", $value['cardId']);
            $prepareQuery->execute();

            // store and execute
            // cast string to array
            $tid = (int)$value['taskId'];
            $tcId = (int)$value['taskCardId'];

            //prepare statement
            $prepareBridge->bindParam(":task_id", $tid);
            $prepareBridge->bindParam(":task_cards_id", $tcId);

            $prepareBridge->execute();
          }
          catch(Exception $err)
          {
            if($err)
            {
              array_push($results, $err);
            }
          }
        }
      }
      else
      {
        array_push($results, "Unknow error has occurred");
      }
      return $results;
    }
}
