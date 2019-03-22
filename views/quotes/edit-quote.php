<?php
require '../../config.php';
include VIEWS.'/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="container filler">
    <h2 class="my-4">Edit Quote</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="form__username-field">Quote: </label>
            <input type="text" class="form__username-field form-control" id="form__username-field" placeholder="An example quote.">
        </div>
        <div class="form-group">
            <label for="form__username-field">Quote Author: </label>
            <input type="text" class="form__password-field form-control" id="form__username-field" placeholder="The author of that quote.">
        </div>
        <div class="form-group">
            <button type="submit" id="form__submit-button" class="btn btn-primary">Submit</button>
        </div>
    </form>
</main>
<?php include VIEWS.'/footer.php'; ?>