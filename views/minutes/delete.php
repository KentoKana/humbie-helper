<?php
require_once '../../config.php';
require_once MODELS . '/Database.php';
require_once CONTROLLERS . '/minutes-controller.php';

if(isset($_GET['m']))
{
  $id = $_GET['m'];
  $db = Database::getDatabase();
  $params = [
    "mId" => $id,
    "db" => $db
  ];
  $result = deleteM($params);
}
