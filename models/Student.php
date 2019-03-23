<?php
require_once('Database.php');
//Direct to another page if this URL is detected.

class Student
{
	//Member Variables
	private $dbh;
	private $fname;
	private $lname;
	private $email;
	private $phone;
	private $username;
	private $password;

	public function __construct($dbh) 
	{
		$this->dbh = $dbh;
	}
	
	//Setters & Getters
	public function setFName($fname) {
		if($fname === "") {
			return false;
		}
		$this->fname = filter_var($fname, FILTER_SANITIZE_STRING);
	}
	public function getFName() {
		return $this->fname;
	}
	public function setLName($lname) {
		if($lname === "") {
			return false;
		}
		$this->lname = filter_var($lname, FILTER_SANITIZE_STRING);
	}
	public function getLName() {
		return $this->lname;
	}
	public function setEmail($email) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->email =  filter_var($email, FILTER_SANITIZE_EMAIL);
        } else {
			return false;
		}
	}
	public function getEmail() {
		return $this->email;
	}
	public function setPhone($phone) {
        if (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
            $this->phone = $phone;
		} else {
			return false;
		}
	}
	public function getPhone() {
		return $this->phone;
	}
	public function setUsername($username) {
		if($username === "") {
			return false;
		}
		$this->username = filter_var($username, FILTER_SANITIZE_STRING);
	}
	public function getUsername() {
		return $this->username;
	}
	public function setPassword($password) {
		if($password === "") {
			return false;
		}
		return $this->password = password_hash($password, PASSWORD_DEFAULT);
	}
	public function getPassword() {
		return $this->password;
	}

	//Validation message for adding/editing students.
	public static function validateData($setter, $msg) {
		if($setter === false) {
			return "<div class='text-danger'>" . $msg . "</div>";
		}
	}

	//List Student Method
	public function listStudents() 
	{
		$selectStmt = "SELECT * FROM students";
		$stmt = $this->dbh->prepare($selectStmt);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function getStudentPass($username) {
		$selectStmt = "SELECT password FROM students WHERE (username = :username)";
		$stmt = $this->dbh->prepare($selectStmt);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getStudentIdByUserName($username) 
	{
		$selectStmt = "SELECT id FROM students WHERE username = :username";
		$stmt = $this->dbh->prepare($selectStmt);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function studentLogin($username, $password) {
		$selectStmt = "SELECT * FROM students WHERE (username = :username) AND (password = :pass)";
		$stmt = $this->dbh->prepare($selectStmt);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':pass', $password);

		$stmt->execute();
		return $stmt->fetch();
	}

	//Get Single Student Method
	public function getStudent($id) 
	{
		$selectStmt = "SELECT * FROM students WHERE id = :id";
		$stmt = $this->dbh->prepare($selectStmt);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch();
	}

	//Add Student Method
	public function addStudent($fname, $lname, $email, $phone, $username, $password) 
	{
		$insertStmt = "INSERT INTO students VALUES (null, :fname, :lname, :email, :phone, :username, :pass, 1,0)";
		//Define query (in this case, reference the insertStmt)
		$stmt = $this->dbh->prepare($insertStmt);  

		//Bind param with values
		$stmt->bindParam(':fname', $fname);
		$stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':pass', $password);

		return $stmt->execute();  
	}

	//Update Student Method
	public function updateStudent($fname, $lname, $email, $phone, $password, $id) 
	{
		$updateStmt = "UPDATE students SET student_fname = :fname, student_lname = :lname, student_email = :email, student_phone = :phone, password = :pass WHERE id = :id";
		//Define query (in this case, reference the insertStmt)
		$stmt = $this->dbh->prepare($updateStmt);  

		//Bind param with values
		$stmt->bindParam(':fname', $fname);
		$stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':phone', $phone);
		// $stmt->bindParam(':username', $username);
		$stmt->bindParam(':pass', $password);
		$stmt->bindParam(':id', $id);

		return $stmt->execute();  
	}
	
	//Delete Student Method
	public function deleteStudent($id) 
	{
		$deleteStmt = "DELETE FROM students WHERE id = :studentID";
		$stmt = $this->dbh->prepare($deleteStmt);  
		$stmt->bindParam(':studentID', $id);
		return $stmt->execute();
	}
}

// $student = new Student(Database::getDatabase());

// Test Scripts
// $student->updateStudent('Update', 'Kanazawa', '123@eg.com', '1111111111', 'kento', 'password',1);
// foreach ($student->listStudents() as $row) {
// 	echo $row['student_fname'] . "<br />" . 
// 		 $row['student_lname'] . "<br />" . 
// 		 $row['student_email'] . "<br />" .
// 		 $row['student_phone'] . "<br /><br />"; 
// }

?>