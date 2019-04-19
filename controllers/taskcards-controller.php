<?php
require_once(realpath(dirname(__DIR__).'\models\TaskCards.php'));
require_once(realpath(dirname(__DIR__).'\lib\functions.php'));
if(isset($_POST['params']))
{
  // set the parameters from the posted jquery
  $params = $_POST['params'];
  if(isset($_GET['method']))
  {
    // perform the function when it matches the values inside the switch statement
    switch($_GET['method'])
    {
      case "addCard":
        addCard($params);
      break;
      case "addTask":
        addTasks($params);
      break;
      case "edit":
        editCard($params);
      break;
      case "delete":
        deleteCard($params);
      break;
      case "sort":
        sortCards($params);
      break;
    }
  }
}

function addCard($p)
{
  $card = new TaskCards($p);
  $append = "";
  $addCard = $card->addCard();
  if($addCard)
  {
    foreach($addCard as $card=> $c)
    {
      $append .= sprintf("<div class='task-card' data-id='%d' data-index='%d'>", $c->id, $c->card_index);
      $append .= sprintf("<div class='card__title'>%s</div>", $c->card_name);
      $append .= sprintf("<div class='card__description'>%s</div>", $c->card_description);
    }
  }
  else
  {
    $append = "error";
  }

  echo $append;
}

function addTasks($p)
{
  $tasks = new TaskCards($p);
  $addTask = $tasks->addTask();
  $newTask = "";

  if($addTask)
  {
    foreach ($addTask as $tasks => $t) {
      $newTask .= "<div class='tasklist__wrapper filtered'>";
      $newTask .= "<div class='tasklist__header filtered'>";
      $newTask .= sprintf("<div class='tasklist__title'><h2>%s:</h2></div>", $t->task_name);
      $newTask .= "</div>";
      $newTask .= sprintf("<div class='tasklist__body tasklist__nested' data-task='%d'></div>", $t->id);
      $newTask .= "<div class='tasklist__footer'>";
      if($t->id == 1){
          $newTask .= sprintf("<button type='button' name='new_card' class='jg-button-primary' value='%d' data-toggle='modal' data-target='#addTaskCard' data-title='Add Card'>Add new card</button>", $t->id);
      }
      $newTask .= "</div></div>";
    }
  }
  else
  {
    $newTask = "failed";
  }

  echo $newTask;
}

function displayTasks($p)
{
  $tasks = new TaskCards($p);
  $getTask = $tasks->generateTasks();

  if($getTask)
  {
    echo $getTask;
  }
  else
  {
    echo "error loading tasks";
  }
}

function deleteCard($p)
{

}

function editCard($p)
{

}

function sortCards($p)
{
  $tasks = new TaskCards($p);
  $sort = $tasks->saveSort();
  if($sort)
  {
      echo json_encode($sort);
  }
}
