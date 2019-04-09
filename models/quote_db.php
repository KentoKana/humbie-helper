<?php
require_once 'Database.php';
class Quote
{
    //List All Quotes
    public function getAllQuotes($db)
    {
        $query = "SELECT * FROM motivational_quotes";
        $statement = $db->prepare($query);
        $statement->execute();
        $quotes = $statement->fetchAll(PDO::FETCH_OBJ);
        return $quotes;
    }
    //Return Specified Quote
    public function getQuoteById($id, $db){
        $query = "SELECT * FROM motivational_quotes 
                  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    //Create New Quote
    public function addQuote($quote_author, $quote, $db)
    {
        $query = "INSERT INTO motivational_quotes (quote_author, quote) 
                  VALUES (:quote_author, :quote) ";
        $statement = $db->prepare($query);
        $statement->bindParam(':quote_author', $quote_author);
        $statement->bindParam(':quote', $quote);
        $count = $statement->execute();
        return $count;
    }
    //Update Quote
    public function editQuote($id, $quote_author, $quote, $db)
    {
        $query = "UPDATE motivational_quotes 
                  SET quote_author = :quote_author, quote = :quote
                  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':quote_author', $quote_author);
        $statement->bindParam(':quote', $quote);
        $count = $statement->execute();
        return $count;
    }
    //Delete Quote
    public function deleteQuote($id, $db)
    {
        $query = "DELETE FROM motivational_quotes 
                  WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $count = $statement->execute();
        return $count;
    }
    public function randomQuote($id, $db)
    {
        $query = "SELECT * FROM motivational_quotes
                  ORDER BY rand()
                  LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
}