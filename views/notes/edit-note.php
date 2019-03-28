<?php require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/note-controller.php';

$student_id = $_SESSION['studentId'];
$project_id = $_SESSION['project_id'];
$note_id = $_SESSION['note_id'];

$project_id = $_SESSION['project_id'];

$note= $n->getNote($note_id, $db);
?>

<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">Notes</h1>
  <div class="form form-group text-center px-5 py-2">
    <form action="" method="POST">
      <div>
        <label for="file-name"> Title: </label>
        <input type="text" class="jg_form__text" name="note_title" value="<?=$note->notes_title?>" />
      </div>
      <div>
      <textarea  name="editor1" class="jg_form__textarea"> <?=$note->notes_content?> </textarea>
    </div>
      <button class="jg-form__submit" type="submit" name="editNote">Save Note!</button>
    </form>
  </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
