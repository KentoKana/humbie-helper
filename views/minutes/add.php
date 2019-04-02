<?php require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once CONTROLLERS . '/minutes-controller.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
$project_id = $student_id = 0;
$parameters = [];

if(isset($_SESSION))
{
  $project_id = $_SESSION['project_id'];
  $student_id = $_SESSION['studentId'];
}

if(isset($_POST['save_button']))
{
  // echo filter_var($_POST['editor1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $title = $_POST['minutes_title'];
  $content = htmlspecialchars($_POST['editor1']);
  $parameters = [
    "pId" => $project_id,
    "title" => $title,
    "desc" => $content
  ];

  add($parameters);
}
?>
<div class="container">
  <div class="col-8 mx-auto">
    <h1>Create Minutes of the Meeting</h1>
    <form action="" method="post" class="mt-3">
      <div class="form-group">
        <label for="minutes_title">Title</label>
        <input type="text" name="minutes_title" id="minutes_title" class="form-control" value="<?= isset($_POST['minutes_title']) ? $_POST['minutes_title'] : "";?>">
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
