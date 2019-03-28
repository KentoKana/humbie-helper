<?php
require '../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/quote-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<main class="container filler">
    <h1 class="my-4">Are you sure you want to delete this quote?</h1>
    <ul>
        <li><?php// echo $myquote->quote ?></li>
        <li><?php// echo $myquote->quote_author ?></li>
    </ul>
    <form action="#" method="POST">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="deletequote" value="Delete Quote">
        </div>
        <div class="form-group">
            <a href="list-quotes.php" class="btn btn-primary">Cancel</a>
        </div>
  </form>
</main>
<?php include VIEWS.'/footer.php'; ?>