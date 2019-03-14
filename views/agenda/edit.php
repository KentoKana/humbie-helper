<?php require_once '../../header.php'; ?>
<div class="container">
  <div class="col-8 mx-auto">
    <h1>Create an Agenda</h1>
    <form action="" method="post" class="mt-3">
      <div class="form-group">
        <label for="agenda_title">Title</label>
        <input type="text" name="agenda_title" id="agenda_title" class="form-control" value="Agenda for Meeting #6">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="agenda_date">Date</label>
          <input type="text" name="agenda_date" class="form-control" value="March 15, 2019">
        </div>
        <div class="form-group col-md-6">
          <label for="agenda_time">Time</label>
          <input type="text" name="agenda_time" class="form-control" value="8:00 - 8:40">
        </div>
      </div>
      <div class="form-group">
        <label for="agenda_location">Location</label>
        <input type="text" name="agenda_location" class="form-control" value="M100">
      </div>
      <div class="form-group">
        <label for="agenda_date">Old Business (separate items with a pipe | )</label>
        <textarea name="old_business" rows="8" cols="80" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="agenda_date">New Business (separate items with a pipe | )</label>
        <textarea name="new_business" rows="8" cols="80" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="agenda_date">New Business (separate items with a pipe | )</label>
        <textarea name="other_business" rows="8" cols="80" class="form-control"></textarea>
      </div>
      <div class="form-group text-md-right">
        <button type="button" name="save_button" class="btn btn-primary">Save</button>
        <button type="button" name="cancel_button" class="btn btn-danger">Cancel</button>
      </div>
    </form>
  </div>
</div>
<?php require_once '../../footer.php'; ?>
