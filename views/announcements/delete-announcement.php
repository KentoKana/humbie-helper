<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once CONTROLLERS . '/announcement-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<main class="container filler">
    <h1 class="my-4">Are you sure you want to delete this announcement?</h1>
    <form action="" method="POST">
        <div class="form-group">
            <ul>
                <li><?php echo $annouceById->announcement_time ?></li>
                <li><?php echo $annouceById->announcement ?></li>
            </ul>
        </div>
        <div class="form-group">
            <input type="submit" class="jg-add-details btn" name="deleteAnnouncement" value="Delete">
            <a href="project-details.php" class="jg-add-details btn">Cancel</a>
        </div>
    </form>
</main>
<?php include VIEWS.'/footer.php'; ?>