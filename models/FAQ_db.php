<?php

class FAQ
{


public function get_all_questions($dbcon){
  $query = "SELECT * FROM FAQ";
  $stm = $dbcon -> prepare($query);
  $stm -> execute();

  $questions = $stm -> fetchALL(PDO::FETCH_OBJ);
  return $questions;
}

public function get_questions_by_category($category_id, $dbcon){

  $query = "SELECT * FROM FAQ WHERE CategoryID = '$category_id' ORDER BY FAQID";
  $stm = $dbcon -> prepare($query);
  $stm -> execute();

  $questions_c = $stm-> fetchAll(PDO::FETCH_OBJ);
  return $questions_c;
}


public function delete_faq($id, $dbcon){

  $query = "DELETE FROM FAQ WHERE FAQID = :id";
  $stm = $dbcon->prepare($query);
  $stm->bindParam(':id', $id);

  $count=$pst->execute();
  return $count;
}

public function add_faq($category_id, $question, $answer, $dbcon)
{

  $query = "INSERT INTO FAQ
              (CategoryID, Question, Answer)
            VALUES
              (:category_id, :question, :answer)";
  $stm = $dbcon->prepare($query);
\
  $stm -> bindParam(':category_id', $category_id);
  $stm -> bindParam(':question', $question);
  $stm -> bindParam(':answer', $answer);

  $count = $stm->execute();
  return $count;
}

public function update_faq($id, $category_id, $question, $answer, $dbcon)
{

  $query = "UPDATE FAQ
            set category_id = :category_id,
            question = :question,
            answer = :answer
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
