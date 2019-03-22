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
//checking is quote was added
    if($c){
        header('Location: ./../list-quotes.php');
    } else {
        echo "Error adding quote.";
    }
}
//editing existing quote
$author = $content = "";
//finding quote to be edit and filling feilds
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $db = Database::getDb();

  $q = new Quote();
  $quote = $q->getQuoteById($id, $db);

  $author = $quote->author;
  $content = $quote->content;
}
//updating quote with new values
if(isset($_POST['updatequote'])){
  $id= $_POST['id'];
  $author = $_POST['author'];
  $content = $_POST['content'];

  $db = Database::getDb();
  $q = new Quote();
  $count = $q->editQuote($id, $author, $content, $db);

  if($count){
     header('Location: list.php');
  } else {
      echo "problem";
  }
}
//delete quote
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = database::getDb();
    $q = new Quote();
    $count = $q->deleteQuote($id, $db);

    if($count){
        echo "Quote Deleted.";
    } else {
        echo "Problem deleting quote.";
    }
}