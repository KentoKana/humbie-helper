<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once CONTROLLERS . '/announcement-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="container filler">
    <h2 class="my-4">Edit Announcement</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="form__username-field">Title: </label>
            <input type="text" class="form__username-field form-control" value="<?php echo $annouceById->announcement_title ?>" name="announcementTitle">
        </div>
        <div class="form-group">
            <label for="form__username-field">Announcement: </label>
            <input type="text" class="form__username-field form-control" value="<?php echo $annouceById->announcement ?>" name="announcement">
        </div>
        <div class="form-group">
            <button type="submit" name="editAnnouncement" class="btn jg-add-details">Submit</button>
            <a href="../project/project-details.php"></a>
        </div>
    </form>
</main>
<?php include VIEWS.'/footer.php'; ?>
