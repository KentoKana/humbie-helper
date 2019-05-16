<?php
require_once '../../config.php';
require_once MODELS . '/Database.php';
require_once CONTROLLERS . '/agenda-controller.php';
require_once LIB . '/functions.php';
$project_id = $student_id = 0;
$db = Database::getDatabase();
$parameters = [];
$err = "";
if(isset($_SESSION))
{
  $project_id = $_SESSION['project_id'];
  $student_id = $_SESSION['studentId'];
}
if(isset($_POST['save_button'])) {
  if(isset($_POST['agenda_title']) && !empty($_POST['agenda_title']))
  {
    $title = $_POST['agenda_title'];
    $content = htmlspecialchars($_POST['editor1']);
    $parameters = [
      "pId" => $project_id,
      "title" => $title,
      "desc" => $content,
      "db" => $db
    ];

    add($parameters);
  }
  else
  {
    $err = genStatusMsg("danger", "Menu title is required!");
  }
}

require_once VIEWS . '/header.php';
?>
<div class="container my-5" id="jg-main">
  <div class="col-8 mx-auto">
    <div class="my-3">
      <?php $err; ?>
    </div>
    <h1>Create an Agenda</h1>
    <form action="" method="post" class="mt-3">
      <div class="form-group">
        <label for="agenda_title">Title</label>
        <input type="text" name="agenda_title" id="agenda_title" class="form-control" value="<?=isset($_POST["agenda_title"]) ? $_POST["agenda_title"] : "" ;?>">
      </div>
      <div class="form-group">
        <label for="wysiwyg_editor">Description</label>
        <textarea name="editor1" id="wysiwyg_editor" rows="8" cols="80" class="form-control">
          <?= isset($_POST['editor1']) ? $_POST['editor1'] : "";?>
        </textarea>
      </div>
      <div class="form-group text-md-right">
        <button type="submit" name="save_button" class="btn btn-primary">Save</button>
        <a href="list.php" class="btn btn-danger">Cancel</a>
      </div>
    </form>
  </div>
</div>
<?php require_once VIEWS . '/footer.php'; ?>
