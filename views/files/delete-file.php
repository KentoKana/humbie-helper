<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once CONTROLLERS . '/upload-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<main class="filler">
    <div id="jg-main" class="container">
        <h1 class="text-center p-5">Are you sure you want to delete this file?</h1>
        <ul class="text-center">
            <li>File Name: <?php echo $fileById->file_title; ?></li>
            <li>Upload Name: <?php echo $fileById->file_path; ?></li>
        </ul>
        <form action="" method="POST">
            <div class="form-group p-5">
                <input type="submit" class="jg-add-details btn" name="deleteFile" value="Delete File">
                <a href="list-files.php" class="jg-add-details btn">Cancel</a>
            </div>
    </form>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>