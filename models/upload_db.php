<?php
require_once 'Database.php';
class File 
{

    private $projectId;
    
    public function getAllFiles($db)
    {
        $query = "SELECT * FROM files";
        $statement = $db->prepare($query);
        $statement->execute();
        $count = $statement->fetchAll(PDO::FETCH_OBJ);
        return $cont;
    }

    public function addFile($file_title, $file_path, $project_id, $db)
    {
        $query = "INSERT INTO files (file_title, file_path, project_id) 
                  VALUES (:file_title, :file_path, :project_id) ";
        $statement = $db->prepare($query);
        $statement->bindParam(':file_title', $file_title);
        $statement->bindParam(':file_path', $file_path);
        $statement->bindParam(':project_id', $project_id);
        $count = $statement->execute();
        return $count;
    }

    public function deleteFile($id, $db)
    {
        $query = "DELETE FROM files 
                  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $count = $statement->execute();
        return $count;
    }
}