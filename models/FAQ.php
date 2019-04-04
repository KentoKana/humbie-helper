<?php
require_once('Database.php');
class Faq
{


public function get_all_questions($dbcon){
  $query = "SELECT * FROM faq";
  $stm = $dbcon -> prepare($query);
  $stm -> execute();

  $questions = $stm -> fetchALL(PDO::FETCH_OBJ);
  return $questions;
}

public function get_questions_by_category($category_id, $dbcon){

  $query = "SELECT * FROM faq WHERE category_id = :category_id ORDER BY id";
  $stm = $dbcon -> prepare($query);
  $stm->bindParam(':category_id', $category_id);
  $stm -> execute();

  $questions = $stm-> fetchAll(PDO::FETCH_OBJ);
  return $questions;
}


public function delete_faq($id, $dbcon){

  $query = "DELETE FROM faq WHERE id = :id";
  $stm = $dbcon->prepare($query);
  $stm->bindParam(':id', $id);

  $count=$pst->execute();
  return $count;
}

public function add_faq($category_id, $question, $answer, $dbcon)
{

  $query = "INSERT INTO faq
              (category_id, faq_question, faq_answer)
            VALUES
              (:category_id, :question, :answer)";
  $stm = $dbcon->prepare($query);

  $stm -> bindParam(':category_id', $category_id);
  $stm -> bindParam(':question', $question);
  $stm -> bindParam(':answer', $answer);

  $count = $stm->execute();
  return $count;
}

public function update_faq($id, $category_id, $question, $answer, $dbcon)
{

  $query = "UPDATE faq
            set category_id = :category_id,
            faq_question = :question,
            faq_answer = :answer
            WHERE id= :id";
  $stm = $dbcon->prepare($query);

  $stm -> bindParam(':category_id', $category_id);
  $stm -> bindParam(':question', $question);
  $stm -> bindParam(':answer', $answer);
  $pst->bindParam(':id', $id);


  $count = $stm->execute();
  return $count;
}
}



 ?>
