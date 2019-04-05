<?php
require_once('Database.php');
//Direct to another page if this URL is detected.

class Timer
{
	//Member Variables
	private $dbh;
	private $time;
    private $studentId;
    private $task;
    private $projectId;

	public function __construct($dbh) 
	{
		$this->dbh = $dbh;
	}
	
	//Setters & Getters
	public function setTime($time) {
		if($time === "") {
			return false;
		}
		$this->time = filter_var($time, FILTER_SANITIZE_STRING);
	}
	public function getTime() {
		return $this->time;
	}
    
    public function setStudentId($studentId) {
		$this->studentId = $studentId;
	}
	public function getStudentId() {
		return $this->studentId;
    }
    public function setTask($task) {
		if($task === "") {
			return false;
		}
		$this->task = filter_var($task, FILTER_SANITIZE_STRING);
	}
	public function getTask() {
		return $this->task;
    }
    public function setProjectId($projectId) {
		$this->projectId = $projectId;
	}
	public function getProjectId() {
		return $this->projectId;
    }

	//List Student Method
	public function listTime() 
	{
		$selectStmt = "SELECT * FROM timers";
		$stmt = $this->dbh->prepare($selectStmt);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	// public function getStudentPass($username) {
	// 	$selectStmt = "SELECT password FROM students WHERE (username = :username)";
	// 	$stmt = $this->dbh->prepare($selectStmt);
	// 	$stmt->bindParam(':username', $username);
	// 	$stmt->execute();
	// 	return $stmt->fetch();
	// }

	// public function getStudentIdByUserName($username) 
	// {
	// 	$selectStmt = "SELECT id FROM students WHERE username = :username";
	// 	$stmt = $this->dbh->prepare($selectStmt);
	// 	$stmt->bindParam(':username', $username);
	// 	$stmt->execute();
	// 	return $stmt->fetch();
	// }

	// public function studentLogin($username, $password) {
	// 	$selectStmt = "SELECT * FROM students WHERE (username = :username) AND (password = :pass)";
	// 	$stmt = $this->dbh->prepare($selectStmt);
	// 	$stmt->bindParam(':username', $username);
	// 	$stmt->bindParam(':pass', $password);

	// 	$stmt->execute();
	// 	return $stmt->fetch();
	// }

	//Add Time Method
	public function addTimer($time, $studentId, $task, $projectId) 
	{
		$insertStmt = "INSERT INTO timers (id, time_taken, student_id, task_name, project_id ) VALUES (null, :timetaken, :studentId, :task, :pid)";
		//Define query (in this case, reference the insertStmt)
		$stmt = $this->dbh->prepare($insertStmt);  

		//Bind param with values
		$stmt->bindParam(':timetaken', $time);
		$stmt->bindParam(':studentId', $studentId);
		$stmt->bindParam(':task', $task);
		$stmt->bindParam(':pid', $projectId);

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