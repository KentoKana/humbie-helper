<?php
require_once MODELS . '/Agenda.php';

function add($settings)
{
  $a = new Agenda($settings);
  $add_new = $a->addAgenda();

  if($add_new)
  {
    header("Location: " . RVIEWS . "/agenda/list.php?added=success");
  }
  else
  {
    header("Location: " . RVIEWS . "/agenda/add.php?added=failed");
  }
}

function edit($settings)
{
  $a = new Agenda($settings);
  $edit_agenda = $a->editAgenda();

  if($edit_agenda)
  {
    header("Location: " . RVIEWS . "/agenda/list.php?edited=success");
  }
  else
  {
    header("Location: " . RVIEWS . "/agenda/edit.php?edited=failed");
  }
}

function editView($settings)
{
  $a = new Agenda($settings);
  $edit_view = $a->viewAgenda();

  if($edit_view)
  {
    return $edit_view;
  }
  else
  {
    header("Location: " . RVIEWS . "/agenda/edit.php?added=failed");
  }
}

function view($settings)
{
  $a = new Agenda($settings);
  $view_agenda = $a->viewAgenda();
  $view = "";
  $html = $formatted_html = "";
  if($view_agenda)
  {
    foreach($view_agenda as $agenda => $a)
    {
      $view .= sprintf('<div class="agenda__header"><h1>%s</h1></div>', $a->agenda_title);
      $view .= sprintf('<div class="agenda__body mt-4">%s</div>', htmlspecialchars_decode($a->agenda_description));
    }
  }
  return $view;
}

function listA($settings)
{
  $a = new Agenda($settings);
  $list_agenda = $a->listAgenda();
  $list = "";

  if($list_agenda)
  {
    foreach($list_agenda as $agenda => $a)
    {
      $list .= "<tr>";
      $list .= sprintf('<td scope="row"><a href="view.php?a=%d">%s</a></td>', $a->id, $a->agenda_title);
      $list .= sprintf('<td scope="row" class="text-md-center">%s</td>', $a->agenda_date );
      $list .= '<td  scope="row" class="text-md-right">';
      $list .= sprintf('<a href="edit.php?a=%d" class="btn btn-dark">Edit</a>', $a->id);
      $list .= ' <a href="#" class="btn btn-primary">Send</a>';
      $list .= sprintf(' <a href="delete.php?a=%d" class="btn btn-danger">Delete</a></td>', $a->id);
      $list .= "</td>";
      $list .= "</tr>";
    }
  }

  return $list;
}

function deleteA($settings)
{
  $a = new Agenda($settings);
  $del_agenda = $a->deleteAgenda();

  if($del_agenda)
  {
      header("Location: " . RVIEWS . "/agenda/list.php?deleted=success");
  }
  else
  {
      header("Location: " . RVIEWS . "/agenda/list.php?deleted=failed");
  }
}
