<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once CONTROLLERS . '/quote-controller.php';
require_once CONTROLLERS . '/announcement-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$projectId = $_SESSION['project_id'];
?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <?php echo $randQuote->quote . " - " . $randQuote->quote_author; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<main class="filler pt-5">
    <div class="container" id="jg-main">
        <h2 class= "p-5 text-center">Add New Announcement</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="announcementTitle">Title: </label>
                <input type="text" class="form-control" name="announcementTitle" >
            </div>
            <div class="form-group">
                <label for="announcement">Announcement: </label>
                <input type="text" class="form-control" name="announcement" >
            </div>
            <div class="pb-5">
                <button type="submit" class="jg-add-details btn" name="addAnnounce">Announce</button>
                <a href="../project/project-details.php" class="jg-add-details btn">Cancel</a>
            </div>
        </form>
    </div>
</main>
<?php include VIEWS . '/footer.php'; ?>