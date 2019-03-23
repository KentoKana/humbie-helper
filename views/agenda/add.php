<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once MODELS . '/Database.php';
require_once MODELS . '/Agenda.php';
require_once CONTROLLERS . '/agenda-controller.php';
?>
<div class="container">
  <div class="col-8 mx-auto">
    <div class="my-3">
      <?php
      if(isset($_POST['save_button']))
      {
        echo addView();
      }
      ?>
    </div>
    <h1>Create an Agenda</h1>
    <form action="" method="post" class="mt-3">
      <div class="form-group">
        <label for="agenda_title">Title</label>
        <input type="text" name="agenda_title" id="agenda_title" class="form-control" value="<?=isset($_POST["agenda_title"]) ? $_POST["agenda_title"] : "" ;?>">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="agenda_date">Date</label>
          <input type="text" name="agenda_date" class="form-control" value="<?=isset($_POST["agenda_date"]) ? $_POST["agenda_date"] : "" ;?>">
        </div>
        <div class="form-group col-md-6">
          <label for="agenda_time">Time</label>
          <input type="text" name="agenda_time" class="form-control" value="<?=isset($_POST["agenda_time"]) ? $_POST["agenda_time"] : "" ;?>">
        </div>
      </div>
      <div class="form-group">
        <label for="agenda_location">Location</label>
        <input type="text" name="agenda_location" class="form-control" value="<?=isset($_POST["agenda_location"]) ? $_POST["agenda_location"] : "" ;?>">
      </div>
      <div class="form-group">
        <label for="agenda_date">Old Business (separate items with a pipe | )</label>
        <textarea name="old_business" rows="8" cols="80" class="form-control"><?=isset($_POST["old_business"]) ? $_POST["old_business"] : "" ;?></textarea>
      </div>
      <div class="form-group">
        <label for="agenda_date">New Business (separate items with a pipe | )</label>
        <textarea name="new_business" rows="8" cols="80" class="form-control"><?=isset($_POST["new_business"]) ? $_POST["new_business"] : "" ;?></textarea>
      </div>
      <div class="form-group">
        <label for="agenda_date">Other Business (separate items with a pipe | )</label>
        <textarea name="other_business" rows="8" cols="80" class="form-control"><?=isset($_POST["other_business"]) ? $_POST["other_business"] : "" ;?></textarea>
      </div>
      <div class="form-group text-md-right">
        <button type="submit" name="save_button" class="btn btn-primary">Save</button>
        <a href="list.php" class="btn btn-danger">Cancel</a>
      </div>
    </form>
  </div>
</div>
<?php require_once VIEWS . '/footer.php'; ?>
