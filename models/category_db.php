<?php

class Category{

public function get_categories($dbcon){
  $query = 'SELECT * FROM faq_categories ORDER BY id';
  $stm = $dbcon -> prepare($query);
  $stm -> execute();

  $categories = $stm -> fetchAll(PDO::FETCH_OBJ);
  return $categories;
}

public function add_category($category_name, $db)
{
  $sql = "INSERT INTO faq_categories (category_name)
          VALUES (:category_name)";
  $pst = $db->prepare($sql);

  $pst->bindParam(':category_name', $category_name);
  $count = $pst->execute();
  return $count;
}

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
