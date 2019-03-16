<?php
require_once '../../header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="container filler">
  <h2 class="my-4">Add New Announcement</h2>
  <form action="#" method="POST">
    <div class="form-group">
      <label for="form__username-field">Announcement: </label>
      <input type="text" class="form__username-field form-control" id="form__username-field" placeholder="Type announcement here...">
    </div>
    <div class="form-group">
      <label for="form__username-field">Project Name: </label>
      <select>
        <option value="project 1">Project 1</option>
        <option value="project 2">Project 2</option>
        <option value="project 3">Project 3</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" id="form__submit-button" class="btn btn-primary">Submit</button>
    </div>
  </form>
</main>
<?php require_once '../../footer.php'; ?>
