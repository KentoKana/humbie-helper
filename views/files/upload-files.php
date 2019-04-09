<?php require './../../config.php';
include VIEWS.'/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
//https://www.youtube.com/watch?v=2jxM7IwpiXc
//With help from the video linked above


//$file_error = $_FILES['upfile']['error']
if (isset($_FILES['upload-file'])){
    //Set extension error to false
    $ext_error = false;

    //Define List of Acceptable Extentions
    $extensions = array('jpg', 'jpeg', 'gif', 'png', 'docx', 'pdf', 'pptx', 'doc', 'txt', 'sql', 'zip');

    //Isolate Extenstion of Uploaded File
    $file_ext = explode('.',$_FILES['upload-file']['name']);
    $file_extension = end($file_ext);

    //Check If Isolated Extension Matches List of Accepted Extentions
    //And Move To Uploaded File
    if(!in_array($file_extension, $extensions)){
        echo 'Invalid file extention. Accepted: jpg, jpeg, gif, png, doc, docx, pptx, ppt, txt, sql, pdf and zip';
    } else {
        echo 'file uploaded';
        move_uploaded_file ($_FILES['upload-file']['tmp_name'], 'uploaded/'.$_FILES['upload-file']['name']);
    }
}
?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">Upload a File</h1>
  <a href="list-files.php">Back to List</a>
  <div class="form form-group text-center  px-5 py-2">
    <form action="" method="POST" enctype = "multipart/form-data">
      <div class="ml-5 mt-2">
        <label for="upload-file"> Choose your file:</label>
        <input type="file"  name="upload-file" />
      </div>
      <button class="jg-form__submit" type="submit" name="addFile">Upload!</button>
    </form>
  </div>
</main>
<?php include VIEWS.'/footer.php'; ?>
