<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
class Database {
	//Data Source Name
	private static $dsn = "mysql:host=localhost;dbname=HumbieHelper";
	private static $username = "root";
	private static $password = "root";
	private static $errMsg;
	//Database Handler
	private static $dbh;
	// private $stmt;  

	//private constructor
	private function __construct() 
	{	
	}

	public static function getDatabase() 
	{	
		if(!isset(self::$dbh))
		{
			$options = 
			[  
				PDO::ATTR_PERSISTENT => true,  
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  
			];
			try 
			{
			//DBH: Database Handle
				self::$dbh = new PDO(self::$dsn, self::$username, self:: $password, $options);
				echo 'db connected!';
			}
			catch(PDOException $e)
			{
				self::$errMsg = $e->getMessage();
			}
		}

		return self::$dbh;
	}

	// //https://www.culttt.com/2012/10/01/roll-your-own-pdo-php-class/
	// //Prepare query statement
	// public function query($query) 
	// {  
	// 	$this->stmt = $this->dbh->prepare($query);  
	// }  

	// //bind parameters
	// public function bind($param, $value) 
	// {
	// 	$this->stmt->bindValue($param, $value);  
	// }  

	// //Execute SQL statement
	// public function executeQuery()
	// {  
	// 	return $this->stmt->execute();  
	// }  
}
?>