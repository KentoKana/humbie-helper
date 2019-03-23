<?php
require '../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/quote-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main id="jg-main" class="m-4">
    <h2 class="text-center pt-3">Edit Quote</h2>
    <form action="#" method="POST">
        <div >
            <label for="quoteInput">Quote: </label>
            <input type="text" class="form__username-field form-control" name="quoteEdit">
        </div>
        <div>
            <label for="">Quote Author: </label>
            <input type="text" class="form-control">
        </div>
        <div>
            <button type="submit" class="jg-form__submit" name="editquote">Submit</button>
        </div>
    </form>
</main>
<?php include VIEWS.'/footer.php'; ?>