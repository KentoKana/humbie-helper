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

	//List Timers organized by projects
	public function projectListForTimer($studentId) 
	{
        $selectStmt = "
            SELECT p.project_name, p.id FROM timers t
            JOIN projects p
            ON t.project_id = p.id
            WHERE t.student_id = :id
        ";
        $stmt = $this->dbh->prepare($selectStmt);
        $stmt->bindParam(':id', $studentId);
        $stmt->execute();
        try{
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo $e;
        }
    }
    
    public function timerListByProject($projectId, $studentId){
        $selectStmt = "
            SELECT * FROM timers WHERE (project_id = :projectId) 
            AND (student_id = :studentId);
        ";
        $stmt = $this->dbh->prepare($selectStmt);
        $stmt->bindParam(':projectId', $projectId);
        $stmt->bindParam(':studentId', $studentId);
        $stmt->execute();
        try{
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo $e;
        }
   }

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
	public function deleteTime($timerId) 
	{
		$deleteStmt = "DELETE FROM timer WHERE id = :timerId";
		$stmt = $this->dbh->prepare($deleteStmt);  
		$stmt->bindParam(':timerId', $timerId);
		return $stmt->execute();
	}
}

?>