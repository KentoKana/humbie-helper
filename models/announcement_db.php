<?php
class Announcement
{
    // list All Announcements
    public function getAllAnnouncements($projectId, $db)
    {
        $query = "SELECT * FROM announcements WHERE project_id = :project_id";
        $statement = $db->prepare($query);
        $statement->bindParam(':project_id', $projectId);
        $statement->execute();
        $announcements = $statement->fetchAll(PDO::FETCH_OBJ);
        return $announcements;
    }
    // return Specified Announcement
    public function getAnnouncementById($id, $db){
        $query = "SELECT * FROM announcements
                  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    // create New Announcement
    public function addAnnouncement($announcementTime, $announcement, $announcementTitle, $studentId, $projectId, $db)
    {
        $query = "INSERT INTO announcements (announcement_time, announcement, announcement_title, student_id, project_id)
                  VALUES (:announcement_time, :announcement, :announcement_title, :student_id, :project_id) ";
        $statement = $db->prepare($query);
        $statement->bindParam(':announcement_time', $announcementTime);
        $statement->bindParam(':announcement', $announcement);
        $statement->bindParam(':announcement_title', $announcementTitle);
        $statement->bindParam(':student_id', $studentId);
        $statement->bindParam(':project_id', $projectId);
        $count = $statement->execute();

        return $count;
    }
    // update Announcement
    public function editAnnouncement($id, $announcementTime, $announcement, $announcementTitle, $studentId, $projectId, $db)
    {
        $query = "UPDATE announcements
                  SET announcement_time = :announcement_time,
                      announcement = :announcement,
                      announcement_title = :announcement_title,
                      student_id = :student_id,
                      project_id = :project_id
                  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':announcement_time', $announcementTime);
        $statement->bindParam(':announcement', $announcement);
        $statement->bindParam(':announcement_title', $announcementTitle);
        $statement->bindParam(':student_id', $studentId);
        $statement->bindParam(':project_id', $projectId);
        $count = $statement->execute();
        return $count;
    }
    // delete Announcement
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
