<?php
require_once('Database.php');
// to do add a isdeleted column in the database and pull only items where status is false

class Project
{
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

  public function addStudentsToProject($project_id,$student_id, $db)
  {
    $sql = "INSERT INTO projects_students(project_id, student_id)
            VALUES (:project_id, :student_id)";
    $pst = $db->prepare($sql);

    $pst->bindParam(':project_id', $project_id);
    $pst->bindParam(':student_id', $student_id);

    $count = $pst->execute();
    return $count;
  }

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

  public function listProjects($student_id, $db)
  {
    $sql = "SELECT projects.id, project_name FROM projects join
    projects_students ON projects.id = projects_students.project_id
    JOIN students ON projects_students.student_id = students.id
    WHERE students.id = :student_id";

    $pst = $db->prepare($sql);
    $pst->bindParam(':student_id', $student_id);
    $pst->execute();
    $p = $pst->fetchAll(PDO::FETCH_OBJ);
    return $p;
  }

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

  public function deleteProject($project_id, $db)
  {
    $sql = "DELETE FROM projects WHERE id = :project_id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':project_id', $project_id);
    $count = $pst->execute();
    return $count;
  }

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
