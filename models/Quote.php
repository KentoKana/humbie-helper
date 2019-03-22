<?php
class Quote
{
    //Return Specified Quote Method
    public function getQuoteById($id, $db){
        $sql = "SELECT * FROM motivational_quotes where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }
    //List All Quotes Method
    public function getAllQuotes($dbcon)
    {
        $sql = "SELECT * FROM motivational_quotes";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $quotes = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $quotes;
    }
    //Create New Quote Method
    public function addQuote($author, $content, $db)
    {
        $sql = "INSERT INTO motivational_quotes (author, content) VALUES (:author, :content) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':author', $author);
        $pst->bindParam(':content', $content);
        $count = $pst->execute();
        return $count;
    }
    //Update Quote Method
    public function editQuote($id, $author, $content, $db)
    {
        $query = "UPDATE motivational_quotes SET author = :author, content = :content WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':author', $author);
        $statement->bindParam(':content', $content);
        $statement->bindParam(':id', $id);
        $count = $statement->execute();
        return $count;
    }
    //Delete Quote Method
    public function deleteQuote($id, $db)
    {
        $query = "DELETE FROM motivational_quotes WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $count = $statement->execute();
        return $count;  
    }
}