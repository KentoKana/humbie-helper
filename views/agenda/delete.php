<?php
require_once '../../config.php';
require_once MODELS . '/Database.php';
require_once CONTROLLERS . '/agenda-controller.php';

if(isset($_GET['a']))
{
  $id = $_GET['a'];
  $db = Database::getDatabase();
  $params = [
    "aId" => $id,
    "db" = > $db
  ];
  $result = deleteA($params);
}
