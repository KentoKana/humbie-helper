<?php

class Category{

public function get_categories($dbcon){
  $query = 'SELECT * FROM FAQCategory ORDER BY CategoryID';
  $stm = $dbcon -> prepare($query);
  $stm -> execute();

  $categories = $stm -> fetchAll(PDO::FETCH_OBJ);
  return $categories;
}


}
 ?>
