<?php include '../../header.php';?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">Edit your Question</h1>
  <div class="form form-group text-center px-5 py-2">
    <form action="" method="POST">
      <div class="jg_form__answer-div">
        <label for="question"> Edit the below question: </label>
        <textarea name="answer" rows="5"> Question to edit pulled from database </textarea>
        <button class="jg-form__submit" type="submit" name="addNote">Save Question</button>
    </form>
  </div>
</main>

<?php include '../../footer.php';?>
