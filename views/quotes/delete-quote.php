<?php
require '../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/quote-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="container filler">
    <h1 class="my-4">Are you sure you want to delete this quote?</h1>
    <form action="#" method="POST">
        <div class="form-group">
            <ul>
                <li name="print-quote"></li>
                <li name="print-quote-author"></li>
            </ul>
        </div>
        <div class="form-group">
            <input type="submit" class="jg-form__submit" name="delete" value="Delete Quote">
        </div>
        <div class="form-group">
            <input type="submit" class="jg-form__submit" name="cancel" value="Delete Quote">
        </div>
  </form>
</main>
<?php include VIEWS.'/footer.php'; ?>