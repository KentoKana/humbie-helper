<?php require_once '../../header.php'; ?>
<div class="container">
  <div class="col-10 mx-auto">
    <div class="options text-md-right">
      <a href="#" class="btn btn-dark">Edit</a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#send_minutes">Send</button>
      <a href="#" class="btn btn-danger">Delete</a>
    </div>
    <div class="minutes col-md-6 mx-auto">
        <div class="minutes__header">
            <h1>Minutes of the meeting - Hospital Website</h1>
            <span class="d-block">Date: <strong>March 15, 2019</strong></span>
            <span class="d-block">Time: <strong>8:00 - 8:45</strong></span>
            <span class="d-block">Location: <strong>M100</strong></span>
        </div>
        <div class="minutes__body mt-4">
          <div class="attendance">
            <h2>Present Members</h2>
            <ul>
              <li>Kento Kanazawa</li>
              <li>Jenna Greenberg</li>
              <li>Ryan Robinson</li>
            </ul>
            <h2>Absent Members</h2>
            <ul>
              <li>Mark Martin</li>
            </ul>
          </div>
          <div class="minutes mt-5">
            <h2>Minutes</h2>
            <ul>
              <li>minutes Item 1</li>
              <li>minutes Item 2</li>
            </ul>
          </div>
          <div class="action mt-5">
            <h2>Action Items</h2>
            <ul>
              <li>Other minutes Item 1</li>
              <li>Other minutes Item 2</li>
            </ul>
          </div>
        </div>
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
<?php require_once '../../footer.php'; ?>
