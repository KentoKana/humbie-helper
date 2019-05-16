<?php
require_once '../../config.php';
require_once CONTROLLERS . '/quote-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once VIEWS . '/header.php';
?>
<main id="jg-main" class="m-4">
    <h1 class="text-center pt-3">Add Motivation Quote</h2>
    <div class="form form-group text-center px-5 py-2">
    <form action="" method="POST">
        <!--Quote Author Feild -->
        <div>
            <label for="quote_author">Quote Author:</label>
            <input type="text" class="jg_form__text" name="quote_author">
        </div>
        <!-- Quote Feild -->
        <div class="pt-2 pl-5 pr-5">
            <label for="quote">Quote:</label>
            <textarea class="jg_form__textarea" name="quote"></textarea>
        </div>
        <!-- Add Quote Button -->
        <div>
            <button type="submit" class="btn btn-primary" name="addquote">Add Quote</button>
        </div>
    </form>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>
