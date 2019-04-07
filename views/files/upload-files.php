<?php require './../../config.php';
include VIEWS.'/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
//https://www.youtube.com/watch?v=2jxM7IwpiXc
//With help from the video linked above

if (isset($_FILES['file-upload'])){
    print_r($_FILES);
}
?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">Upload a File</h1>
  <div class="form form-group text-center  px-5 py-2">
    <form action="" method="POST" enctype = "multipart/form-data">
      <div>
        <label for="file-name"> File Name: </label>
        <input type="text" class="jg_form__text" name="file-name" />
      </div>
      <div class="ml-5 mt-2">
        <label for="file-upload"> Choose your file:</label>
        <input type="file"  name="file-upload" />
      </div>
      <button class="jg-form__submit" type="submit" name="addFile">Upload!</button>
    </form>
  </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
