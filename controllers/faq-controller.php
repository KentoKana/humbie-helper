<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(MODELS.'/Faq.php');
require_once(MODELS.'/Faq_categories.php');
require_once(LIB. '/functions.php');

$db = Database::getDatabase();
$f = new Faq();
$ca = new Faq_category();
$errormsg = "";

// Logic for adding a new category for the FAQs
if(isset($_POST['addCat'])){
  $category_name = $_POST['category_name'];
  if(empty($category_name)){
    $errormsg .= "You cannot have empty fields. Please fill
    in all fields and try again.";
  }else{
    $c = $ca->add_category($category_name, $db);
    if($c){
      header('Location:list-categories.php');
    }else{
      $errormsg .= "Error adding category, please try again later.";
    }
  }
}

//Logic for deleting a category from the faq_category table
if(isset($_POST['delete'])){
  $id = $_POST['cat_id'];
  $c = $ca->delete_category($id, $db);
  if($c){
    header('Location:list-categories.php');
  }else{
    $errormsg .= "Problem delteting the category. Please try again.";
  }
}

//TO DO: Editing a category


//Logic for adding a new FAQ to FAQ table
if(isset($_POST['addFaq'])){
  $category_id = $_POST['category_id'];
  $question = $_POST['question'];
  $answer = $_POST['answer'];
  if(empty($question || $answer)){
    $errormsg .= "Sorry you cannot have a blank field. Please fill
    in all fields and try again";} else{
      $c = $f->add_faq($category_id, $question, $answer, $db);
      if($c){
        header('Location:list-faq-page.php');
      }else{
        $errormsg .= "Trouble adding FAQ. Please try again";
      }
    }
  }
