<?php
require_once('Database.php');

class Student
{
	private $dbh;

	public function __construct($dbh) 
	{
		$this->dbh = $dbh;
	}

	public function listStudents() 
	{
		$selectStmt = "SELECT * FROM students";
		$stmt = $this->dbh->prepare($selectStmt);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function addStudent($fname, $lname, $email, $phone) 
	{
		$insertStmt = "INSERT INTO students VALUES (null, :fname, :lname, :email, :phone)";
		//Define query (in this case, reference the insertStmt)
		$stmt = $this->dbh->prepare($insertStmt);  

		//Bind param with values
		$stmt->bindParam(':fname', $fname);
		$stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':phone', $phone);

		return $stmt->execute();  
	}

	public function updateStudent($fname, $lname, $email, $phone, $studentId) 
	{
		$updateStmt = "UPDATE students SET student_fname = :fname, student_lname = :lname, student_email = :email, student_phone = :phone WHERE id = :id";
		//Define query (in this case, reference the insertStmt)
		$stmt = $this->dbh->prepare($updateStmt);  

		//Bind param with values
		$stmt->bindParam(':fname', $fname);
		$stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':id', $studentId);

		return $stmt->execute();  
	}
	
	public function deleteStudent($studentId) 
	{
		$deleteStmt = "DELETE FROM students WHERE id = :studentID";
		$stmt = $this->dbh->prepare($deleteStmt);  
		$stmt->bindParam(':studentID', $studentId);
		return $stmt->execute();
	}
}

$student = new Student(Database::getDatabase());

//Test Scripts
$student->updateStudent('Kento', 'Kanazawa', '123@eg.com', '2222222222', 1);
foreach ($student->listStudents() as $row) {
	echo $row['student_fname'] . "<br />" . 
		 $row['student_lname'] . "<br />" . 
		 $row['student_email'] . "<br />" .
		 $row['student_phone'] . "<br /><br />"; 
}

?>