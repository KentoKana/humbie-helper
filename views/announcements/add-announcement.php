<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once CONTROLLERS . '/quote-controller.php';
require_once CONTROLLERS . '/announcement-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <?php echo $randQuote->quote . " - " . $randQuote->quote_author; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<main class="container filler">
    <h2 class="my-4">Add New Announcement</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="form__username-field">Announcement: </label>
            <input type="text" class="form__username-field form-control" name="announcement" >
        </div>
        <div>
            <button type="submit" class="btn btn-primary" name="addAnnounce">Announce</button>
            <a href="../project/project-details.php" class="btn">Cancel</a>
        </div>
    </form>
</main>
<?php include VIEWS . '/footer.php'; ?>