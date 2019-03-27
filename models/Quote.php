<?php
require_once('Database.php');
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
    public function addQuote($quote_author, $quote, $db)
    {
        $sql = "INSERT INTO motivational_quotes (quote_author, quote) VALUES (:quote_author, :quote) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':quote_author', $quote_author);
        $pst->bindParam(':quote', $quote);
        $count = $pst->execute();
        return $count;
    }
    //Update Quote Method
    public function editQuote($id, $quote_author, $quote, $db)
    {
        $query = "UPDATE motivational_quotes SET quote_author = :quote_author, author = :author WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':quote_author', $quote_author);
        $statement->bindParam(':quote', $quote);
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