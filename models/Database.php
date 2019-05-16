<?php
//Direct to another page if this URL is detected.
class Database
{
	//Data Source Name
	private static $dsn = "mysql:host=localhost;dbname=skrip748_humbiehelper";
	private static $username = "skrip748_humbie";
	private static $password = "_ys(2[JV.S;M";
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
				// echo $e;
				// echo "DB not working";
				exit();
			}
		}
		return self::$dbh;
	}
}
// Database::getDatabase();
?>
