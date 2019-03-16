<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
//Direct to another page if this URL is detected.
class Database 
{
	//Data Source Name
	private static $dsn = "mysql:host=localhost;dbname=humbiehelper";
	private static $username = "root";
	private static $password = "root";
	private static $errMsg;

	//Database Handler
	private static $dbh;

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
				// echo "it works!";
			}
			catch(PDOException $e)
			{
				self::$errMsg = $e->getMessage();
				// echo "not working";
				exit();
			}
		}
		return self::$dbh;
	}
}

// Database::getDatabase();
?>