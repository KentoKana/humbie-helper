<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once MODELS . '/Database.php';

$dbContext = Database::getDatabase();
$query = "SELECT * FROM agendas WHERE id = :agendaid AND project_id = :projectid";
$agendaid = 1;
$projectid = 1;
$stmt = $dbContext->prepare($query);
$stmt->bindParam(":agendaid", $agendaid);
$stmt->bindParam(":projectid", $projectid);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
$items;
$agendaOBJ;
foreach ($result as $key => $value) {
  $items = $value->agenda_title;
  $agendaOBJ = json_decode($value->agenda_description);
}

  $old = $old_items = "";
  if(isset($agendaOBJ->old_business))
  {
    $old = $agendaOBJ->old_business;
    $old_items = implode('|', $old);
  }

  $new = $new_items = "";
  if(isset($agendaOBJ->new_business))
  {
    $new = $agendaOBJ->new_business;
    $new_items = implode('|', $new);
  }

  $other = $other_items = "";
  if(isset($agendaOBJ->other_business))
  {
    $other = $agendaOBJ->other_business;
    $other_items = implode('|', $other);
  }

?>
<div class="container">
  <div class="col-8 mx-auto">
    <h1>Edit Agenda</h1>
    <form action="" method="post" class="mt-3">
      <div class="form-group">
        <label for="agenda_title">Title</label>
        <input type="text" name="agenda_title" id="agenda_title" class="form-control" value="<?= $items; ?>">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="agenda_date">Date</label>
          <input type="text" name="agenda_date" class="form-control" value="<?= $agendaOBJ->agenda_date; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="agenda_time">Time</label>
          <input type="text" name="agenda_time" class="form-control" value="<?= $agendaOBJ->agenda_time; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="agenda_location">Location</label>
        <input type="text" name="agenda_location" class="form-control" value="<?= $agendaOBJ->agenda_location; ?>">
      </div>
      <div class="form-group">
        <label for="agenda_date">Old Business (separate items with a pipe | )</label>
        <textarea name="old_business" rows="8" cols="80" class="form-control"><?=$old_items;?></textarea>
      </div>
      <div class="form-group">
        <label for="agenda_date">New Business (separate items with a pipe | )</label>
        <textarea name="new_business" rows="8" cols="80" class="form-control"><?=$new_items;?></textarea>
      </div>
      <div class="form-group">
        <label for="agenda_date">New Business (separate items with a pipe | )</label>
        <textarea name="other_business" rows="8" cols="80" class="form-control"><?=$other_items;?></textarea>
      </div>
      <div class="form-group text-md-right">
        <button type="button" name="save_button" class="btn btn-primary">Save</button>
        <button type="button" name="cancel_button" class="btn btn-danger">Cancel</button>
      </div>
    </form>
  </div>
</div>
<?php require_once VIEWS . '/footer.php'; ?>
