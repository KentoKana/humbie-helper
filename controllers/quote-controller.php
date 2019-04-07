<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once MODELS . '/quote_db.php';

//Connecting To Database
$db = Database::getDatabase();
$q = new Quote();

///Define get all quotes and get quote by id
$myquote = $q->getAllQuotes(Database::getDatabase());
$quotebyid = $q->getQuoteById(filter_input(INPUT_GET, 'id'), Database::getDatabase());
//Getting User Inputs
$id = filter_input(INPUT_GET, 'id');
$quote = filter_input(INPUT_POST, 'quote');
$quote_author = filter_input(INPUT_POST, 'quote_author');

//Adding New Quote
if (isset($_POST['addquote'])) {
    $count = $q->addQuote($quote_author, $quote, $db);
    if($count){
        header('Location:' . RVIEWS . '/quotes/list-quotes.php');
    } else {
        echo "There was a problem adding quote.";
    }
}
//Updating Existing Quote
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

// $allQuotes = $q->countQuotes($id,$db);

// function getQuoteArrLength($allQuotes) {
//     $length = "";
//     foreach ($allQuotes[0] as $key => $length){
//         return $length;
//     }
// }

// $minusArray = getQuoteArrLength($allQuotes) - 1;
// $quoteSelect = rand (0, $minusArray);

// $randQuote = $q->getRandomQuote($quoteSelect, $id, $db);

// var_dump($randQuote);

$randQuote = $q->randomQuote($id, $db);

echo $randQuote->quote . " - " . $randQuote->quote_author;