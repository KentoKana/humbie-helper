<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once CONTROLLERS . '/upload-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<main id="jg-main" class="m-4">
    <h1 class="my-4">Are you sure you want to download this file?</h1>
    <ul>
        <li>File Name: <?php echo $fileById->file_title; ?></li>
        <li>Upload Name: <?php echo $fileById->file_path; ?></li>
    </ul>
    <form action="" method="POST">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="downloadFile" value="Download">
        </div>
        <div class="form-group">
            <a href="list-files.php" class="btn btn-primary">Cancel</a>
        </div>
  </form>
</main>
<?php include VIEWS.'/footer.php'; ?>