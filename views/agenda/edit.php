<?php
require_once '../../config.php';
require_once MODELS . '/Database.php';
require_once CONTROLLERS . '/agenda-controller.php';
require_once LIB . '/functions.php';

$aID = $piD = 0;
$db = Database::getDatabase();
if(isset($_GET['a']))
{
  $aID = $_GET['a'];
  $pID = $_SESSION['project_id'];
  $params = [
    "pId" => $pID,
    "aId" => $aID,
    "db" => $db
  ];

  $editView = editView($params);
}
else
{
    header("Location: " . RVIEWS. "/agenda/list.php");
}

if(isset($_GET['edited']))
{
  if($_GET['edited'] == 'failed')
  {
    echo genStatusMsg("danger", "Unknown error was encountered, please try again!");
  }
}

// place header after redirect statements
require_once VIEWS . '/header.php';
?>
<div class="container my-5" id="jg-main">
  <div class="col-8 mx-auto">
    <div class="my-3">
      <?php
        if(isset($_POST['save_button'])) {
          if(isset($_POST['agenda_title']) && !empty($_POST['agenda_title']))
          {

            $parameters = [
              "aId" => $aID,
              "title" => $_POST['agenda_title'],
              "desc" => htmlspecialchars($_POST['editor1']),
              "db" => $db
            ];

            edit($parameters);
          }
          else
          {
            return genStatusMsg("danger", "Menu title is required!");
          }
        }
       ?>
    </div>
    <h1>Edit Agenda</h1>
    <form action="" method="post" class="mt-3">
      <div class="form-group">
        <label for="agenda_title">Title</label>
        <input type="text" name="agenda_title" id="agenda_title" class="form-control" value="<?= isset($_POST['agenda_title']) ? $_POST['agenda_title'] : $editView[0]->agenda_title; ?>">
      </div>
      <label for="wysiwyg_editor">Description</label>
      <textarea name="editor1" id="wysiwyg_editor" rows="8" cols="80" class="form-control">
          <?= isset($_POST['editor1']) ? $_POST['editor1'] : htmlspecialchars_decode($editView[0]->agenda_description); ?>
      </textarea>
      <div class="form-group text-md-right">
        <button type="submit" name="save_button" class="btn btn-primary">Save</button>
        <a href="list.php" class="btn btn-danger">Cancel</a>
      </div>
    </form>
  </div>
</div>
<?php require_once VIEWS . '/footer.php'; ?>
