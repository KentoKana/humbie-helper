<?php
require '../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/quote-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main id="jg-main" class="m-4">
    <h2 class="text-center pt-3">Edit Quote</h2>
    <div class="form form-group text-center px-5 py-2">
    <form action="#" method="POST">
        <div >
            <label for="quoteInput">Quote: </label>
            <input type="text" class="jg_form__text" name="quoteEdit" value="<?php $quote; ?>">
        </div>
        <div>
            <label for="">Quote Author: </label>
            <input type="text" class="jg_form__text" value="<?php $quote_author; ?>">
        </div>
        <div>
            <button type="submit" class="jg-form__submit" name="editquote">Submit</button>
        </div>
    </form>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>