<?php
require_once 'Database.php';
class Announcement
{
    //List All Announcements
    public function getAllAnnouncements($dbcon)
    {
        $query = "SELECT * FROM announcements";
        $statement = $dbcon->prepare($query);
        $statement->execute();
        $announcements = $statement->fetchAll(PDO::FETCH_OBJ);
        return $announcements;
    }
    //Return Specified Announcement
    public function getAnnouncementById($id, $db){
        $query = "SELECT * FROM announcements 
                  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    //Create New Announcement
    public function addAnnouncement($announcement_time, $announcement, $student_id, $project_id, $db)
    {
        $query = "INSERT INTO announcements (announcement_time, announcement, student_id, project_id) 
                  VALUES (:announcement_time, :announcement, :student_id, project_id) ";
        $statement = $db->prepare($query);
        $statement->bindParam(':announcement_time', $announcement_time);
        $statement->bindParam(':announcement', $announcement);
        $statement->bindParam(':student_id', $student_id);
        $statement->bindParam(':project_id', $project_id);
        $count = $statement->execute();
        return $count;
    }
    //Update Announcement
    public function editAnnouncement($id, $announcement_time, $announcement, $db)
    {
        $query = "UPDATE announcements 
                  SET announcement_time = :announcement_time, 
                      announcement = :announcement,
                      student_id = :student_id,
                      project_id = :project_id
                  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':announcement_time', $announcement_time);
        $statement->bindParam(':announcement', $announcement);
        $statement->bindParam(':student_id', $student_id);
        $statement->bindParam(':project_id', $project_id);
        $count = $statement->execute();
        return $count;
    }
    //Delete Announcement
    public function deleteAnnouncement($id, $db)
    {
        $query = "DELETE FROM announcements 
                  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $count = $statement->execute();
        return $count;
    }
}