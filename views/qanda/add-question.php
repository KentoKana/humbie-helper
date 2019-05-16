<?php include '../../header.php';?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">Submit a Question</h1>
  <div class="form form-group text-center px-5 py-2">
    <form action="" method="POST">
      <div class="jg_form__answer-div">
        <label for="question"> Have a question you need help with? Post it here to see if any of your peers can help! </label>
        <textarea name="answer" rows="5"> Type your question here... </textarea>
        <button class="jg-form__submit" type="submit" name="addNote">Submit Question!</button>
    </form>
  </div>
</main>

<?php include '../../footer.php';?>
