<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once CONTROLLERS . '/announcement-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="filler pt-5">
    <div class="container" id="jg-main">
        <h2 class="text-center p-5">Edit Announcement</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="form__username-field">Title: </label>
                <input type="text" class="form__username-field form-control" value="<?php echo $annouceById->announcement_title ?>" name="announcementTitle">
            </div>
            <div class="form-group">
                <label for="announcement">Announcement: </label>
                <input type="text" class="form-control" value="<?php echo $annouceById->announcement ?>" name="announcement">
            </div>
            <div class="form-group pb-5">
                <button type="submit" name="editAnnouncement" class="btn jg-add-details">Submit</button>
                <a href="../project/project-details.php" class="jg-add-details btn">Cancel</a>
            </div>
        </form>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>
