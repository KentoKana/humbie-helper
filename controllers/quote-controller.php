<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(MODELS.'/Quote.php');

//database connection to list quotes
$dbcon = Database::getDatabase();
$q = new Quote();
$myquote =  $q->getAllQuotes(Database::getDatabase());

//entering a new quote to database
<<<<<<< HEAD

=======
if(isset($_POST['addquote'])){
    $author = $_POST['quote_author'];
    $content = $_POST['quote'];
    
    $db = Database::getDatabase();
    $q = new Quote();
    $c = $q->addQuote($author, $content, $db);
//checking is quote was added
    if($c){
        header('Location:' . RVIEWS . '/quotes/list-quotes.php');
    } else {
        echo "Error adding quote.";
    }
}
>>>>>>> 9dc49dd52d0802b154400ce0f025b4fd9e3a42c4
//editing existing quote
$quote_author = $quote = "";
//finding quote to be edit and filling feilds
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $db = Database::getDatabase();

  $q = new Quote();
  $quote = $q->getQuoteById($id, $db);

  $quote_author = $quote->quote_author;
  $quote = $quote->quote;
}
//updating quote with new values
if(isset($_POST['updatequote'])){
  $id= $_POST['id'];
  $author = $_POST['quote_author'];
  $content = $_POST['quote'];

  $db = Database::getDatabases();
  $q = new Quote();
  $count = $q->editQuote($id, $quote_author, $quote, $db);

  if($count){
     header('Location: list-quotes.php');
  } else {
      echo "problem";
  }
}
//delete quote
if(isset($_POST['deletequote'])){
    $id = $_GET['id'];
    $db = database::getDatabase();
    $q = new Quote();
    $count = $q->deleteQuote($id, $db);

    if($count){
        header('Location: list-quotes.php');
    } else {
        echo "Problem deleting quote.";
    }
}