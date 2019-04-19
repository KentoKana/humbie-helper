<?php
require '../../config.php';
require_once MODELS . '/Database.php';
require_once CONTROLLERS . '/minutes-controller.php';
require_once LIB . '/functions.php';

$mID = $piD = 0;
$db = Database::getDatabase();
$params = [];
if(isset($_GET['m']))
{
  $mID = $_GET['m'];
  $pID = $_SESSION['project_id'];
  $params = [
    "pId" => $pID,
    "mId" => $mID,
    "db" => $db
  ];
}
else
{
  header("Location: " . RVIEWS. "/minutes/list.php");
}

require_once VIEWS . '/header.php';
?>
<div class="container my-5" id="jg-main">
  <div class="col-10 mx-auto">
    <div class="row">
      <div class="options text-md-left col-md-6">
        <a href="list.php" class="btn btn-link">Back to List</a>
      </div>
      <div class="options text-md-right col-md-6">
        <a href="edit.php?m=<?=$mID;?>>" class="btn btn-dark">Edit</a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#send_minutes">Send</button>
        <a href="delete.php?m=<?=$mID;?>" class="btn btn-danger">Delete</a>
      </div>
    </div>
    <div class="minutes col-md-12 mx-auto my-5">
        <?php
          echo view($params);
         ?>
    </div>
  </div>
  <div class="modal" tabindex="-1" role="dialog" id="send_minutes">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Send Minutes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient" class="d-block">Recipient:</label>
              <input type="email" name="recipient_email" class="d-block form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Send Minutes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once VIEWS . '/footer.php'; ?>
