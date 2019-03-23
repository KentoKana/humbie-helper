<?php
require_once LIB . '/functions.php';
function generateList($id)
{
  $dbContext = Database::getDatabase();
  $myAgenda = new Agenda();
  $result = $myAgenda->listAgenda($id, $dbContext);
  $list = "";

  foreach($result as $key => $val){
      $list .= "<tr>";
      $list .= sprintf('<td scope="row"><a href="view.php?a=%d&p=%d">%s</a></td>', $val->id, $val->project_id, $val->agenda_title );
      $list .= sprintf('<td scope="row" class="text-md-center">%s</td>', $val->agenda_date );
      $list .= '<td  scope="row" class="text-md-right">';
      $list .= sprintf('<a href="edit.php?a=%d&p=%d" class="btn btn-dark">Edit</a>', $val->id, $val->project_id);
      $list .= ' <a href="#" class="btn btn-primary">Send</a>';
      $list .= sprintf(' <a href="delete.php?a=%d" class="btn btn-danger">Delete</a></td>', $val->id);
      $list .= "</td>";
      $list .= "</tr>";
  }

  return $list;
}

function generateView($agendaid, $projectid)
{
    $dbContext = Database::getDatabase();
    $myAgenda = new Agenda();
    $result = $myAgenda->viewAgenda($agendaid, $projectid,$dbContext);
    $renderOBJ = "";
    $descOBJ;
    $old = $new = $other = "";

      foreach($result as $key=>$val)
      {
        $renderOBJ .= '<div class="agenda__header">';
        $renderOBJ .= sprintf("<h1>%s</h1>", $val->agenda_title);
        $descOBJ = json_decode($val->agenda_description);
        $renderOBJ .= sprintf('<span class="d-block">Date: <strong>%s</strong></span>', $descOBJ->agenda_date);
        $renderOBJ .= sprintf('<span class="d-block">Location: <strong>%s</strong></span>', $descOBJ->agenda_location);
        $renderOBJ .= '</div>'; // close header
        $renderOBJ .= '<div class="agenda__body mt-4">';

        // check for old/new/other businesses

          if($descOBJ->old_business[0] !== "")
          {
            $old = $descOBJ->old_business;
            $renderOBJ .= "<h2>Old Business</h2>";
            $renderOBJ .= "<ul>";
            foreach ($old as $o)
            {
              $renderOBJ .= sprintf('<li>%s</li>', $o);
            }
            $renderOBJ .= "</ul>";
          }

          if($descOBJ->new_business[0] !== "")
          {
            $new = $descOBJ->new_business;
            $renderOBJ .= "<h2>New Business</h2>";
            $renderOBJ .= "<ul>";
            foreach ($new as $n)
            {
              $renderOBJ .= sprintf('<li>%s</li>', $n);
            }
            $renderOBJ .= "</ul>";
          }

          if($descOBJ->other_business[0] !== "")
          {
            $other = $descOBJ->other_business;
            $renderOBJ .= "<h2>Other Business</h2>";
            $renderOBJ .= "<ul>";
            foreach ($other as $ot)
            {
              $renderOBJ .= sprintf('<li>%s</li>', $ot);
            }
            $renderOBJ .= "</ul>";
          }

        $renderOBJ .= "</div>"; //close the body
      }

    return $renderOBJ;
}

function addView()
{
  if(isset($_POST['agenda_title']) && !empty($_POST['agenda_title']))
  {
    $agenda = $_POST['agenda_title'];
    $old_business = explode("|", $_POST['old_business']);
    $new_business = explode("|", $_POST['new_business']);
    $other_business = explode("|", $_POST['other_business']);

    $data = array(
        "agenda_date" => $_POST['agenda_date'],
        "agenda_time" => $_POST['agenda_time'],
        "agenda_location" => $_POST['agenda_location'],
        "old_business" => $old_business,
        "new_business" => $new_business,
        "other_business" => $other_business,
    );

    $agenda_description = json_encode($data);
    $project_id = 7;

    $dbContext = Database::getDatabase();
    $myAgenda = new Agenda();
    $addAgenda = $myAgenda->addAgenda($agenda, $agenda_description, $project_id, $dbContext);

    if($addAgenda)
    {
        return header("Location: " . RVIEWS . "/agenda/list.php?added=success");
    }
    else
    {
        return gheader("Location: " . RVIEWS . "/agenda/list.php?added=failed");
    }
  }
  else
  {
    return genStatusMsg("danger", "Agenda title is required!");
  }
}

function showEditView($agendaid, $projectid)
{
  $dbContext = Database::getDatabase();
  $myAgenda = new Agenda();
  $result = $myAgenda->viewAgenda($agendaid, $projectid, $dbContext);

  return $result;
}

function editView()
{
    if(isset($_POST['agenda_title']) && !empty($_POST['agenda_title']))
    {
      $agenda = $_POST['agenda_title'];
      $old_business = explode("|", $_POST['old_business']);
      $new_business = explode("|", $_POST['new_business']);
      $other_business = explode("|", $_POST['other_business']);
      $agendaid = $_GET['a'];
      $data = array(
          "agenda_date" => $_POST['agenda_date'],
          "agenda_time" => $_POST['agenda_time'],
          "agenda_location" => $_POST['agenda_location'],
          "old_business" => $old_business,
          "new_business" => $new_business,
          "other_business" => $other_business,
      );

      $agenda_description = json_encode($data);

      $dbContext = Database::getDatabase();
      $myAgenda = new Agenda();
      $editAgenda = $myAgenda->editAgenda($agenda, $agenda_description, $agendaid, $dbContext);

      if($editAgenda)
      {
          return genStatusMsg("success", "You have successfully Edited this Agenda!");
      }
      else
      {
          return genStatusMsg("danger", "We have encountered an Unknown error please try again!");
      }
    }
    else
    {
      return genStatusMsg("danger", "Agenda title is required!");
    }

}

function deleteView($agendaid)
{
  $dbContext = Database::getDatabase();
  $myAgenda = new Agenda();

  $deleteAgenda = $myAgenda->deleteAgenda($agendaid, $dbContext);
  if($deleteAgenda)
  {
      return header("Location: " . RVIEWS . "/agenda/list.php?deleted=success");
  }
  else
  {
      return header("Location: " . RVIEWS . "/agenda/list.php?deleted=failed");
  }
}
