<?php
require_once '../../config.php';
require_once CONTROLLERS . '/announcement-controller.php';
require_once VIEWS . '/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<main class="filler pt-5">
    <div class="container" id="jg-main">
        <h1 class="text-center p-5">Are you sure you want to delete this announcement?</h1>
        <form action="" method="POST">
            <ul>
            <li><?php echo $annouceById->announcement_title ?></li>
                <li><?php echo $annouceById->announcement_time ?></li>
                <li><?php echo $annouceById->announcement ?></li>
            </ul>
            <div class="pb-5 pl-5">
                <input type="submit" class="jg-add-details btn" name="deleteAnnouncement" value="Delete">
                <a href="../project/project-details.php" class="jg-add-details btn">Cancel</a>
            </div>
        </form>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>
