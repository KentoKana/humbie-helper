<?php
require_once('Database.php');

class Faq_category{

//function that gets all categories from the database
public function get_categories($dbcon){
  $query = 'SELECT * FROM faq_categories ORDER BY id';
  $stm = $dbcon -> prepare($query);
  $stm -> execute();

  $categories = $stm -> fetchAll(PDO::FETCH_OBJ);
  return $categories;
}

//function that gets one specific category based on primary key id
public function get_category($id, $db){
  $sql = 'SELECT * FROM faq_categories WHERE id = :id';
  $pst = $db->prepare($sql);
  $pst->bindParam(':id', $id);
  $pst->execute();
  $category = $pst-> fetch(PDO::FETCH_OBJ);
  return $category;
}

// function that lets you add a category to the database table
public function add_category($category_name, $db)
{
  $sql = "INSERT INTO faq_categories (category_name)
          VALUES (:category_name)";
  $pst = $db->prepare($sql);

  $pst->bindParam(':category_name', $category_name);
  $count = $pst->execute();
  return $count;
}

//function that lets you delete a category from the database
public function delete_category($id, $db)
{
  $sql ="DELETE FROM faq_categories
         WHERE id=:id";

  $pst = $db->prepare($sql);
  $pst->bindParam(':id', $id);
  $count = $pst->execute();
  return $count;

}

}
 ?>
