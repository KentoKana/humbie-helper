<?php
require_once '../../config.php';
require_once MODELS . '/Database.php';
require_once MODELS . '/Minutes.php';
require_once CONTROLLERS . '/minutes-controller.php';


if(isset($_GET['m']))
{
  $id = $_GET['m'];
  $params = [
    "mId" => $id
  ];
  $result = deleteM($params);
}
