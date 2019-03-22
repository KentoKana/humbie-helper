<?php require './../../config.php';
include VIEWS.'/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">Name of Note</h1>
  <div class="text-center p-2">
    Note stored in database goes here.
  </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
