<?php
require_once('Database.php');

class Project
{
  // function to create a new project
  public function addProject($project_name, $project_description, $student_id, $db)
  {
    $sql = "INSERT INTO projects (project_name, project_description, student_id)
            VALUES (:project_name, :project_description, :student_id)";
    $pst = $db->prepare($sql);

    $pst->bindParam(':project_name', $project_name);
    $pst->bindParam(':project_description', $project_description);
    $pst->bindParam(':student_id', $student_id);

    $count = $pst->execute();
    return $count;
  }

  // function to add more students into a project once it  has been created
  public function addStudentsToProject($project_id,$student_id, $db)
  {

    $sql = "SELECT COUNT(*) FROM projects_students
    WHERE student_id= :student_id AND project_id = :project_id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':student_id', $student_id);
    $pst->bindParam(':project_id', $project_id);
    $pst->execute();
    $rows = $pst->fetchColumn();
    if ($rows[0] > 0) {
        $errormsg = "This student is already in the project! ";
    }else{
      $sql = "INSERT INTO projects_students(project_id, student_id)
              VALUES (:project_id, :student_id)";
      $pst = $db->prepare($sql);

      $pst->bindParam(':project_id', $project_id);
      $pst->bindParam(':student_id', $student_id);

      $count = $pst->execute();
      return $count;
    }
  }

  // function that shows all students who have been added to a specific project
  public function listStudentsInProject($project_id, $db)
  {
    $sql = "SELECT student_fname, student_lname FROM students join
    projects_students ON students.id = projects_students.student_id
    JOIN projects ON projects_students.project_id = projects.id
    WHERE projects.id = :project_id";

    $pst = $db->prepare($sql);

    $pst->bindParam(':project_id', $project_id);
    $pst->execute();
    $s = $pst->fetchAll(PDO::FETCH_OBJ);
    return $s;
  }

  // function that returns data on a single project based on primary key id
  public function singleProject($project_id, $db)
  {
    $sql = "SELECT * FROM projects
            WHERE id = :project_id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':project_id', $project_id);
    $pst-> execute();
    $p = $pst->fetch(PDO::FETCH_OBJ);
    return $p;
  }

  // function that lists all active projects for a logged in user(student)
  public function listProjects($student_id, $db)
  {
    $sql = "SELECT projects.id, project_name FROM projects join
    projects_students ON projects.id = projects_students.project_id
    JOIN students ON projects_students.student_id = students.id
    WHERE students.id = :student_id AND projects.is_deleted = 0";

    $pst = $db->prepare($sql);
    $pst->bindParam(':student_id', $student_id);
    $pst->execute();
    $p = $pst->fetchAll(PDO::FETCH_OBJ);
    return $p;
  }

  //function that allows a student to edit the details of a project
  public function editProject($project_id, $project_name, $project_description, $db)
  {
    $sql = "UPDATE projects
            set project_name = :project_name,
            project_description = :project_description
            WHERE id = :project_id";

    $pst = $db->prepare($sql);
    $pst->bindParam(':project_name', $project_name);
    $pst->bindParam(':project_description', $project_description);
    $pst->bindParam(':project_id', $project_id);

    $count = $pst->execute();
    return $count;
  }

  //function to delete a project, doesn't actually delete the project just changes the is_deleted column so it doesn't show up in other functions
  public function deleteProject($project_id, $db)
  {
    $sql = "UPDATE projects
    set is_deleted = 1
    WHERE id = :project_id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':project_id', $project_id);
    $count = $pst->execute();
    return $count;
  }

  // function that lists all students/users of the site --> use this to select students for the add students to project function 
  public function listStudents($db)
  {
    $sql = "SELECT * FROM students";
		$pst = $db->prepare($sql);
		$pst->execute();
		$s = $pst->fetchAll(PDO::FETCH_OBJ);
    return $s;
  }

}



?>
