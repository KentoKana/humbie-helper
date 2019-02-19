<?php
require_once('Database.php');

class Student
{
	private $dbh;

	function __construct($dbh) 
	{
		$this->dbh = $dbh;
	}

	public function addStudent($fname, $lname, $email, $phone) 
	{
		$insertStmt = "INSERT INTO students VALUES (null, :fname, :lname, :email, :phone)";
		//Define query (in this case, reference the insertStmt)
		$stmt = $this->dbh->prepare($insertStmt);  

		//Bind param with values
		$stmt->bindValue(':fname', $fname);
		$stmt->bindValue(':lname', $lname);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':phone', $phone);
		return $stmt->execute();  
	}
	
	public function deleteStudent($studentId) 
	{
		$deleteStmt = "DELETE FROM students WHERE studentID = :studentID";
		$this->query(self::$deleteStmt);
		$this->bind(':studentID', $studentId);
	}
}

$student = new Student(Database::getDatabase());

//Test Scripts
$student->addStudent('Kento', 'Kanazawa', '123@eg.com', '9999999999');

?>