<?php
//Direct to another page if this URL is detected.

class Deadline
{
    //Member Variables
	private $dbh;
	private $name;
	private $date;
	private $description;
	private $projectId;

	public function __construct($dbh)
	{
		$this->dbh = $dbh;
	}

	//Setters & Getters
	public function setName($name) {
		if($name === "") {
			return false;
		}
		$this->name = filter_var($name, FILTER_SANITIZE_STRING);
	}
	public function getName() {
		return $this->name;
	}
	public function setDate($date) {
		if($date === "") {
			return false;
		}
		$this->date = filter_var($date, FILTER_SANITIZE_STRING);
	}
	public function getDate() {
		return $this->date;
	}
	public function setDescription($description) {
		if($description === "") {
			return false;
		}
		$this->description = filter_var($description, FILTER_SANITIZE_STRING);
	}
	public function getDescription() {
		return $this->description;
	}

	//Validation message for adding/editing deadlines.
	public static function validateData($setter, $msg) {
		if($setter === false) {
			return "<div class='text-danger'>" . $msg . "</div>";
		}
	}

	public function listDeadlines($id)
	{
		$selectStmt = "SELECT * FROM project_deadlines WHERE project_id = :id";
        $stmt = $this->dbh->prepare($selectStmt);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function getDeadline($id)
	{
		$selectStmt = "SELECT * FROM project_deadlines WHERE id = :id";
        $stmt = $this->dbh->prepare($selectStmt);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function addDeadline($name, $date, $description, $projectId)
	{
		$insertStmt = "INSERT INTO project_deadlines VALUES (Default, :dName, :dDate, :dDesc, :projectId)";
		//Define query (in this case, reference the insertStmt)
		$stmt = $this->dbh->prepare($insertStmt);

		//Bind param with values
		$stmt->bindParam(':dName', $name);
		$stmt->bindParam(':dDate', $date);
		$stmt->bindParam(':dDesc', $description);
		$stmt->bindParam(':projectId', $projectId);

		return $stmt->execute();
	}

	//Update Student Method
	public function updateDeadline($name, $date, $desc, $id)
	{
		$updateStmt = "UPDATE project_deadlines SET event_name = :name, event_date = :date, event_description = :eventDesc WHERE id = :id";
		//Define query (in this case, reference the insertStmt)
		$stmt = $this->dbh->prepare($updateStmt);

		//Bind param with values
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':date', $date);
		$stmt->bindParam(':eventDesc', $desc);
		$stmt->bindParam(':id', $id);

		return $stmt->execute();
	}

	//Delete Student Method
	public function delDeadline($id)
	{
		$deleteStmt = "DELETE FROM project_deadlines WHERE id = :deadlineId";
		$stmt = $this->dbh->prepare($deleteStmt);
		$stmt->bindParam(':deadlineId', $id);
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
