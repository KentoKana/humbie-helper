<?php
require_once '../../config.php';
require_once CONTROLLERS . '/announcement-controller.php';
require_once VIEWS . '/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="filler p-5">
    <div class="container" id="jg-main">
      <div class="col-md-6 mx-auto">
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
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>
