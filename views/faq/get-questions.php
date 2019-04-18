<?php require './../../config.php';
require_once CONTROLLERS.'/faq-controller.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);



if(isset($_POST["id"]))
{
  $id = $_POST["id"];
  $faqs = $f->get_questions_by_category($id, $db);
  $category = $ca->get_category($id, $db);
  $currentpage = $_SERVER['REQUEST_URI'];
}

$output = '';

$output .=   "<h1 class='category_name'>". $category->category_name . "</h1>";

foreach($faqs as $faq){
  $output .= "<li class='jg_faq__question'>" . $faq->faq_question . "</li>" .
              "<li class='jg_faq__answer'>" . $faq->faq_answer . "</li>";
}


echo $output;
