<?php

class Database {
  private static $dsn='mysql:host=localhost;dbname=humbiehelper';
  private static $username= 'root';
  private static $password= 'root';
  private static $db = 'classb';
  private static $dbcon;

  private function __construct()
  {

  }

  public static function getDB(){
    if(!isset(self::$dbcon)){
      try{
        self::$dbcon = new PDO(self::$dsn, self::$username, self::$password);
        self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e){
        $error_message =$e->getMessage();
        //include('../errors/databas_error.php');
        exit();
      }
    }
    return self::$dbcon;
  }
}
?>
