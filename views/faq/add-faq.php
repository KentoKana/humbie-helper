<?php require './../../config.php';
require_once CONTROLLERS.'/faq-controller.php';
$categories = $ca->get_categories($db);
require_once VIEWS.'/header.php';
?>

<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3"> Add FAQ </h1>
  <div class="text-danger text-center pt-3"><?=$errormsg?></div>
  <div class="form form-group text-center px-5 py-2">
    <form action="" method="POST">
      <div>
        <label for="category"> Category Name: </label>
        <select name="category_id">
          <?php foreach($categories as $category):?>
            <option value="<?=$category->id?>"><?=$category->category_name?></option>
          <?php endforeach; ?>
        </select>
    </div>
    <div>
      <label for="question"> Question: </label>
    </div>
    <div>
        <input type="text" class="jg_form__text" name="question"
        value="<?php if(isset($_POST['question'])){
          echo $question;} ?>"/>
    </div>
    <div>
      <label for="anwser"> Answer: </label>
    </div>
    <div>
        <input type="text" class="jg_form__text" name="answer"
        value="<?php if(isset($_POST['answer'])){
          echo $answer;} ?>"/>
    </div>

      <button class="jg-form_submit" type="submit" name="addFaq">Add new FAQ!</button>

    </form>
  </div>
</main>

<?php include VIEWS. '/footer.php'; ?>
