<?php
require '../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/quote-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main id="jg-main" class="m-4">
    <h2 class="text-center pt-3">Add New Quote</h2>
    <div class="form form-group text-center px-5 py-2">
    <form action="#" method="POST">
        <div>
            <label for="author">Quote Author:</label>
            <input type="text" class="jg_form__text" name="author">
        </div>
        <div id="editor" class="pt-2 pl-5 pr-5">
            <textarea class="jg_form__textarea" name="content"></textarea>
        </div>
        <div>
            <button type="submit" class="jg-form__submit" name="addquote">Add Quote</button>
        </div>
    </form>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>