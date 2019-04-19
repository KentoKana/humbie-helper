<?php
require_once MODELS . '/Minutes.php';

function add($settings)
{
  $m = new Minutes($settings);
  $add_new = $m->addMinutes();

  if($add_new)
  {
    return header("Location: " . RVIEWS . "/minutes/list.php?added=success");
  }
  else
  {
    return header("Location: " . RVIEWS . "/minutes/add.php?added=failed");
  }
}

function edit($settings)
{
  $m = new Minutes($settings);
  $edit_minutes = $m->editMinutes();

  if($edit_minutes)
  {
    return header("Location: " . RVIEWS . "/minutes/list.php?edited=success");
  }
  else
  {
    return header("Location: " . RVIEWS . "/minutes/edit.php?edited=failed");
  }
}

function editView($settings)
{
  $m = new Minutes($settings);
  $edit_view = $m->viewMinutes();

  if($edit_view)
  {
    return $edit_view;
  }
  else
  {
    return header("Location: " . RVIEWS . "/minutes/edit.php?added=failed");
  }
}

function view($settings)
{
  $m = new Minutes($settings);
  $view_minutes = $m->viewMinutes();
  $view = "";
  $html = $formatted_html = "";
  if($view_minutes)
  {
    foreach($view_minutes as $minutes => $min)
    {
      $view .= sprintf('<div class="minutes__header"><h1>%s</h1></div>', $min->minutes_title);
      $view .= sprintf('<div class="minutes__body mt-4">%s</div>', htmlspecialchars_decode($min->minutes_description));
    }
  }
  return $view;
}

function listM($settings)
{
  $m = new Minutes($settings);
  $list_minutes = $m->listMinutes();
  $list = "";
  if($list_minutes)
  {
    foreach($list_minutes as $minutes => $min)
    {
      $list .= "<tr>";
      $list .= sprintf('<td scope="row"><a href="view.php?m=%d">%s</a></td>', $min->id, $min->minutes_title);
      $list .= sprintf('<td scope="row" class="text-md-center">%s</td>', $min->minutes_date );
      $list .= '<td  scope="row" class="text-md-right">';
      $list .= sprintf('<a href="edit.php?m=%d" class="btn btn-dark">Edit</a>', $min->id);
      $list .= ' <a href="#" class="btn btn-primary">Send</a>';
      $list .= sprintf(' <a href="delete.php?m=%d" class="btn btn-danger">Delete</a></td>', $min->id);
      $list .= "</td>";
      $list .= "</tr>";
    }
  }
  return $list;
}

function deleteM($settings)
{
  $m = new Minutes($settings);
  $del_minutes = $m->deleteMinutes();

  if($del_minutes)
  {
      return header("Location: " . RVIEWS . "/minutes/list.php?deleted=success");
  }
  else
  {
      return header("Location: " . RVIEWS . "/minutes/list.php?deleted=failed");
  }
}
