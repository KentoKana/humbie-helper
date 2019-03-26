<?php require './../../config.php';
include VIEWS.'/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['addNote'])){
  $title = $_POST['notename'];
  $content = $_POST['content'];

  echo $title;
  echo $content;
}
?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">Notes</h1>
  <div class="form form-group text-center px-5 py-2">
    <form action="" method="POST">
      <div>
        <label for="file-name"> Title: </label>
        <input type="text" class="jg_form__text" name="notename" />
      </div>
      <div>
        <input name="content" type="hidden">
        <div id="editor" class="pt-2 pl-5 pr-5">
          <!--<textarea name="content" class="jg_form__textarea"> Type note here </textarea>-->
        </div>
      </div>
      <button class="jg-form__submit" type="submit" name="addNote">Save Note!</button>
    </form>
    <div id="print"></div>
  </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
