<?php 
require_once './../../config.php';
require_once VIEWS.'/header.php';
require_once CONTROLLERS.'/upload-controller.php';
$projectId = $_SESSION['project_id'];
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="filler">
    <div id="jg-main" class="container" >
        <h1 class="text-center pt-3">Upload a File</h1>
        <a href="list-files.php">Back to List</a>
        <div class="form form-group text-center  px-5 py-2">
            <form action="" method="POST" enctype = "multipart/form-data">
                <div class="ml-5 mt-2">
                    <label for="fileName">Name of File: </label>
                    <input type="text"  name="fileName" />
                </div>
                <div class="ml-5 mt-2">
                    <label for="upload-file">Choose your file: </label>
                    <input type="file"  name="uploadFile" />
                </div>
                <button class="jg-form__submit" type="submit" name="addFile">Upload!</button>
            </form>
        </div>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>