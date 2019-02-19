<?php
require_once('Database.php');

class Student extends Database
{
	private static $insertStmt = "INSERT INTO students VALUES (null, :fname, :lname, :email, :phone)";

	public function getStudent($fname, $lname, $email, $phone) 
	{
		//Define query
		$this->query(self::$insertStmt);
		$this->bind(':fname', $fname);
		$this->bind(':lname', $lname);
		$this->bind(':email', $email);
		$this->bind(':phone', $phone);
	}

	public function addStudent() 
	{
		echo 'Student added.';
		return $this->execute();
	}

}

$student = new Student();

//Test Scripts
$student->getStudent('Kento', 'Kanazawa', '123@eg.com', '2343333333');
$student->addStudent();

?>