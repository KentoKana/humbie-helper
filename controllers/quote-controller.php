<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(MODELS.'/Quote.php');
//entering a new quote to database
if(isset($_POST['addquote'])){
    $author = $_POST['author'];
    $content = $_POST['content'];
    
    $db = Database::getDb();
    $q = new Quote();
    $c = $q->addQuote($author, $content, $db);

    if($c){
        header('Location: ../list-quotes.php');
    } else {
        echo "Error adding quote.";
    }
}