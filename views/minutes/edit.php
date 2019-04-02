<?php require '../../config.php';
include VIEWS . '/header.php';
require_once CONTROLLERS . '/minutes-controller.php';

$mID = $piD = 0;
if(isset($_GET['m']) && isset($_GET['p']))
{
  $mID = $_GET['m'];
  $pID = $_GET['p'];
  $params = [
    "pId" => $pID,
    "mId" => $mID
  ];

  $editView = editView($params);
}
else
{
  header("Location: " . RVIEWS. "/minutes/list.php");
}

if(isset($_GET['edited']))
{
  if($_GET['edited'] == 'failed')
  {
    echo genStatusMsg("danger", "Unknown error was encountered, please try again!");
  }
}

if(isset($_POST['save_button']))
{
  $parameters = [
    "mId" => $mID,
    "title" => $_POST['minutes_title'],
    "desc" => htmlspecialchars($_POST['editor1'])
  ];

  edit($parameters);
}
?>
<div class="container">
  <div class="col-8 mx-auto">
    <div class="row">
        <a href="list.php" class="btn btn-link tex-md-right">Back to List</a>
    </div>
    <h1>Edit</h1>
    <form action="" method="post" class="mt-3">
      <div class="form-group">
        <label for="minutes_title">Title</label>
        <input type="text" name="minutes_title" id="minutes_title" class="form-control" value="<?= isset($_POST['minutes_title']) ? $_POST['minutes_title'] : $editView[0]->minutes_title; ?>">
      </div>
      <div class="form-group">
        <label for="wysiwyg_editor">Description</label>
        <textarea name="editor1" id="wysiwyg_editor" rows="8" cols="80" class="form-control">
          <?= isset($_POST['editor1']) ? $_POST['editor1'] : htmlspecialchars_decode($editView[0]->minutes_description); ?>
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
