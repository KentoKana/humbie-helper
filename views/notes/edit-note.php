<?php require './../../config.php';
require_once CONTROLLERS.'/note-controller.php';

$student_id = $_SESSION['studentId'];
$project_id = $_SESSION['project_id'];
$note_id = $_SESSION['note_id'];

$project_id = $_SESSION['project_id'];

$note= $n->getNote($note_id, $db);
require_once VIEWS . '/header.php';
?>

<main id="jg-main" class="m-4">
  <!--Here is how we edit a note -->

  <h1 class="text-center pt-3">Notes</h1>
  <div class="text-danger text-center pt-3"><?=$errormsg?></div>
  <div class="form form-group text-center px-5 py-2">
    <form action="" method="POST">
      <div>
        <label for="file-name"> Title: </label>
        <input type="text" class="jg_form__text form-control" name="note_title" value="<?=$note->notes_title?>" />
      </div>
      <div>
      <textarea  name="editor1" class="jg_form__textarea"> <?=$note->notes_content?> </textarea>
    </div>
      <button class="jg-form__submit btn" type="submit" name="editNote">Save Note!</button>
    </form>
  </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
