<?php include '../../header.php';?>
<div id="jg-main" class="m-4 p-5">
    <button id="jg-humbie-button" type="button" class="jg-button-primary position-absolute" data-toggle="modal" data-target="#exampleModal">
       Need help?
    </button>
  <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body">
          <div class="jg-hippo-sprite p-3 mb-3">
              <div id="jg-hippo-sprite__image"></div>
              <p id="jg-hippo-sprite__text"> Hi! I'm Humbie, how can I help you? </p>
          </div>
          <div class="row">
    <div class="col-4">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#list-home" role="tab" aria-controls="home">General</a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Timer</a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">My Account</a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Groups</a>
      </div>
    </div>
    <div class="col-8">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Common question list with links to take you to individual page</div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
      </div>
    </div>
  </div>
        </div>
      </div>
    </div>
  </div>
  </div>

<?php include '../../footer.php';?>
