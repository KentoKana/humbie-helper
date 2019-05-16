<?php require './../../config.php';
require_once CONTROLLERS.'/faq-controller.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// $db = Database::getDatabase();
// $f = new Faq();
// $ca = new Faq_category();

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



//   foreach($faqs as $faq){
//     $output .= "<div class='card'>
//       <div class='card-header jg-accordion__header' id='headingOne'>
//         <h5 class='mb-0'>
//           <button class='btn btn-link' data-toggle='collapse' data-target=''#collapseOne' aria-expanded='true' aria-controls='collapseOne'>"
//             . $faq->faq_question . $currentpage .
//           "</button>
//         </h5>
//       </div>
//
//       <div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordion'>
//         <div class='card-body'>"
//           . $faq->faq_answer .
//       "</div>
//     </div>
//   </div>";
// }
echo $output;
