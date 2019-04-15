<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once MODELS . '/quote_db.php';

//Connecting To Database
$db = Database::getDatabase();
$q = new Quote();

//returns all quotes
$myquote = $q->getAllQuotes(Database::getDatabase());
//Returns quote by id
$quotebyid = $q->getQuoteById(filter_input(INPUT_GET, 'id'), Database::getDatabase());
//Getting Random Quote From Database
$randQuote = $q->randomQuote($db);

//Getting User Inputs
$id = filter_input(INPUT_GET, 'id');
$quote = filter_input(INPUT_POST, 'quote');
$quote_author = filter_input(INPUT_POST, 'quote_author');
//Add new quote to database when add button is clicked
if (isset($_POST['addquote'])) {
    $count = $q->addQuote($quote_author, $quote, $db);
    if($count){
        header('Location:' . RVIEWS . '/quotes/list-quotes.php');
    } else {
        echo "There was a problem adding quote.";
    }
}
//Update database with edited quote info
if (isset($_POST['updatequote'])) {
    $count = $q->editQuote($id, $quote_author, $quote, $db);
    if($count){
        header('Location: list-quotes.php');
    } else {
        echo "There was a problem updating quote.";
    }
}
//Deleting Existing Quote
if (isset($_POST['deletequote'])) {
    $count = $q->deleteQuote($id, $db);
    if($count){
        header('Location: list-quotes.php');
    } else {
        echo "There was a problem deleting quote.";
    }
}