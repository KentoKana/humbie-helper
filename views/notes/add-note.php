<?php require './../../config.php';
require_once CONTROLLERS.'/note-controller.php';
$_SESSION['studentId'];
$_SESSION['project_id'];
$project_id = $_SESSION['project_id'];

require_once VIEWS . '/header.php';
?>
<main id="jg-main" class="m-4">
  <!--Form to add a new note to the database -->

  <h1 class="text-center pt-3">Notes</h1>
  <div class="text-danger text-center pt-3"><?=$errormsg?></div>
  <div class="form form-group text-center px-5 py-2">
    <form action="" method="POST">
      <div>
        <label for="file-name"> Title: </label>
        <input type="text" class="jg_form__text form-control" name="note_title" value="<?php
          if(isset($_POST['note_title'])){
            echo $note_title;}
            ?>" />
      </div>
      <div>
      <textarea  name="editor1" class="jg_form__textarea"> <?php
        if(isset($_POST['editor1'])){
          echo $note_content;}
          ?> </textarea>
    </div>
      <button class="jg-form__submit btn" type="submit" name="addNote">Save Note!</button>
    </form>
  </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
