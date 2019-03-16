<?php
require_once '../../header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="container filler">
  <h1 class="my-4">Are you sure you want to delete this announcement?</h1>
  <form action="#" method="POST">
    <div class="form-group">
      <ul>
        <li name="print-annoucement-author"></li>
        <li name="print-annoucement-time"></li>
        <li name="print-annoucement-content"></li>
      </ul>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="delete-quote" value="Delete Announcement">
    </div>
  </form>
</main>
<?php require_once '../../footer.php'; ?>