<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once MODELS . '/quote_db.php' ;
require_once CONTROLLERS . '/quote-controller.php' ;
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main id="jg-main" class="m-4">
    <h2 class="text-center pt-3">Edit Quote</h2>
    <div class="form form-group text-center px-5 py-2">
    <form action="" method="POST">
        <!-- Author Edit Feild -->
        <div>
            <label for="quote_author">Quote Author:</label>
            <input type="text" name="quote_author" 
            value="<?php echo $quotebyid->quote_author; ?>" />
        </div>
        <!-- Quote Edit Feild -->
        <div class="pt-2 pl-5 pr-5">
            <label for="quote">Quote:</label>
            <input type="text" name="quote" value="<?php echo $quotebyid->quote; ?>" />
        </div>
        <!-- Submit Edited Quote-->
        <div>
            <button type="submit" class="jg-form__submit" name="updatequote">Submit</button>
        </div>
    </form>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>