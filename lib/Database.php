<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Database {
	//Data Source Name
	private static $dsn = "mysql:host=localhost;dbname=HumbieHelper";
	private static $username = "root";
	private static $password = "root";
	private static $errMsg;
	private $dbh;
	private $stmt;  


	public function __construct() 
	{
		$options = 
		[  
			PDO::ATTR_PERSISTENT => true,  
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  
		];
		try 
		{
			//DBH: Database Handle
			$this->dbh = new PDO(self::$dsn, self::$username, self:: $password, $options);
			echo "connected";
		}
		catch(PDOException $e)
		{
			self::$errMsg = $e->getMessage();
		}
	}


	//https://www.culttt.com/2012/10/01/roll-your-own-pdo-php-class/
	//Prepare query statement
	public function query($query) 
	{  
		$this->stmt = $this->dbh->prepare($query);  
	}  

	//bind parameters
	public function bind($param, $value) 
	{
		$this->stmt->bindValue($param, $value);  
	}  

	//Execute SQL statement
	public function execute()
	{  
		return $this->stmt->execute();  
		// echo "New record created successfully";
	}  
}


//Test Script
//Instantiate database object.
$conn = new Database();
//Define query
$conn->query("INSERT INTO students VALUES (null, :fname, :lname, :email, :phone)");
//Bind query parameters with values.
$conn->bind(':fname', 'kento');
$conn->bind(':lname', 'kanazawa');
$conn->bind(':email', 'john@example.com');
$conn->bind(':phone', '2002432342');
//Execute sql statement
$conn->execute();


?>