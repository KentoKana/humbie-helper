<?php require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/faq-controller.php';


?>

<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3"> Add Category </h1>
  <div class="text-danger text-center pt-3"><?=$errormsg?></div>
  <div class="form form-group text-center px-5 py-2">
    <form action="" method="POST">
      <label for="category"> Category Name: </label>
      <input type="text" class="jg_form__text" name="category_name"
      value="<?php if(isset($_POST['category_name'])){
        echo $category_name;} ?>"/>
      <button class="jg-form_submit" type="submit" name="addCat">Add a Category!</button>
    </form>
  </div>
</main>

<?php include VIEWS. '/footer.php'; ?>
