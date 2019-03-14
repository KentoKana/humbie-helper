<?php require_once '../../header.php'; ?>
<div class="container">
  <div class="col-10 mx-auto">
    <div class="options text-md-right">
      <a href="#" class="btn btn-dark">Edit</a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#send_agenda">Send</button>
      <a href="#" class="btn btn-danger">Delete</a>
    </div>
    <div class="agenda col-md-6 mx-auto">
        <div class="agenda__header">
            <h1>Agenda Title</h1>
            <span class="d-block">Date: <strong>February 10, 2019</strong></span>
            <span class="d-block">Location: <strong>M100</strong></span>
        </div>
        <div class="agenda__body mt-4">
          <h2>Old Business</h2>
          <ul>
            <li>Old Agenda 1</li>
            <li>Old Agenda 2</li>
          </ul>
          <h2>New Business</h2>
          <ul>
            <li>Agenda Item 1</li>
            <li>Agenda Item 2</li>
          </ul>
          <h2>Other Business</h2>
          <ul>
            <li>Other Agenda Item 1</li>
            <li>Other Agenda Item 2</li>
          </ul>
        </div>
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
<?php require_once '../../footer.php'; ?>
