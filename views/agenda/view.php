<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once MODELS . '/Agenda.php';
require_once MODELS . '/Database.php';
require_once CONTROLLERS . '/agenda-controller.php';

if(isset($_GET['a']) && isset($_GET['p']))
{
    $agendaid = $_GET['a'];
    $projectid = $_GET['p'];
}
else
{
    header("Location: " . RVIEWS. "/agenda/list.php");
}
?>
<div class="container">
  <div class="col-10 mx-auto">
    <div class="options text-md-right">
      <a href="edit.php?a=<?=$agendaid;?>&p=<?=$projectid;?>" class="btn btn-dark">Edit</a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#send_agenda">Send</button>
      <a href="delete.php?a=<?=$agendaid;?>&p=<?=$projectid;?>" class="btn btn-danger">Delete</a>
    </div>
    <div class="agenda col-md-8 mx-auto">
      <?php
        echo generateView($agendaid, $projectid);
       ?>
    </div>
  </div>
  <div class="modal" tabindex="-1" role="dialog" id="send_agenda">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Send Agenda</h5>
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
          <button type="button" class="btn btn-primary">Send Agenda</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once VIEWS . '/footer.php'; ?>
