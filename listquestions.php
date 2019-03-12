<?php
require_once 'models/database1.php';
require_once 'models/category_db.php';
require_once 'models/FAQ_db.php';
include 'header.php';


$dbcon = Database::getDb();
$q = new FAQ();
$c = new Category();

$all_cat = $c->get_categories(Database::getDb());


foreach($all_cat as $category){
  $faqs = $q ->get_questions_by_category($category->CategoryID,Database::getDb());
  echo "<h2>" . $category->CategoryName . "</h2><br />";
  foreach($faqs as $faq){
    echo "<span class='question'>" . $faq->Question . " </span> <br />";
    echo "<span class='answer'>" .$faq->Answer . "</span> <br />";
  }
}

include 'footer.php'

 ?>
