<?php
require_once '../../config.php';
require_once MODELS . '/Database.php';
require_once MODELS . '/Agenda.php';
require_once CONTROLLERS . '/agenda-controller.php';

if(isset($_GET['a']))
{
  $id = $_GET['a'];
  deleteView($id);
}
