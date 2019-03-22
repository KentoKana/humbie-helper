<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once MODELS . '/Database.php';

if(isset($_POST['save_button']))
{
    $agenda = $_POST['agenda_title'];
    $old_business = explode("|", $_POST['old_business']);
    $new_business = explode("|", $_POST['new_business']);
    $other_business = explode("|", $_POST['other_business']);

    $data = array(
        "agenda_date" => $_POST['agenda_date'],
        "agenda_time" => $_POST['agenda_time'],
        "agenda_location" => $_POST['agenda_location'],
        "old_business" => $old_business,
        "new_business" => $new_business,
        "other_business" => $other_business,
    );

    $agenda_description = json_encode($data);
    $project_id = 1;

    $dbContext = Database::getDatabase();
    $query = "INSERT INTO agendas (agenda_title, agenda_description, project_id) VALUES (:agenda_title, :agenda_description, :project_id)";
    $stmt = $dbContext->prepare($query);
    $stmt->bindParam(":agenda_title", $agenda);
    $stmt->bindParam(":agenda_description", $agenda_description);
    $stmt->bindParam(":project_id", $project_id);

    $result = $stmt->execute();

    if($result)
    {
        echo "Success!";
    }
    else
    {
        echo "Failed!";
    }
}
?>
<div class="container">
  <div class="col-8 mx-auto">
    <h1>Create an Agenda</h1>
    <form action="" method="post" class="mt-3">
      <div class="form-group">
        <label for="agenda_title">Title</label>
        <input type="text" name="agenda_title" id="agenda_title" class="form-control">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="agenda_date">Date</label>
          <input type="text" name="agenda_date" class="form-control">
        </div>
        <div class="form-group col-md-6">
          <label for="agenda_time">Time</label>
          <input type="text" name="agenda_time" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="agenda_location">Location</label>
        <input type="text" name="agenda_location" class="form-control">
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
        <button type="submit" name="save_button" class="btn btn-primary">Save</button>
        <button type="button" name="cancel_button" class="btn btn-danger">Cancel</button>
      </div>
    </form>
  </div>
</div>
<?php require_once VIEWS . '/footer.php'; ?>
