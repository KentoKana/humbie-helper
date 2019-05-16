<?php
require_once '../../config.php';
require_once CONTROLLERS . '/upload-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once VIEWS.'/header.php';
?>

<main class="filler">
    <div id="jg-main" class="container">
        <h1 class="text-center p-5">Are you sure you want to download this file?</h1>
        <ul class="text-center">
            <li>File Name: <?php echo $fileById->file_title; ?></li>
            <li>Upload Name: <?php echo $fileById->file_path; ?></li>
        </ul>
        <form action="" method="POST">
            <div class="form-group">
                <input type="submit" class="jg-form__submit" name="downloadFile" value="Download">
            </div>
            <div class="form-group p-5">
                <a href="list-files.php" class="jg-add-details btn">Cancel</a>
            </div>
        </form>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>
