<?php require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/upload-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$projectId = $_SESSION['project_id'];
?>
<main id="jg-main" class="m-4">
    <h1 class="text-center pt-3">All Files</h1>
    <a href="upload-files.php">Upload New File</a>
    <div class="text-center px-5 py-2">
        <table class="table">
            <thead class="jg_table__thead">
                <tr>
                    <th> Upload Name </th>
                    <th> File Name </th>
                    <th> Date Uploaded </th>
                    <th> Delete </th>
                    <th> Download </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $files = $f->getAllFiles($projectId, $db);
                foreach ($files as $file) {
                ?>
                <tr class="jg_table__tbody">
                    <td><?php  echo $file['file_title']; ?></td>
                    <td><?php  echo $file['file_path']; ?></td>
                    <td><?php  echo $file['upload_date']; ?></td>
                    <td>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $file['id']; ?>">
                            <a href="delete-file.php?id=<?php echo $file['id'];?>" class="btn btn-primary">Delete</a>
                        </form>
                    </td>
                    <td>
                        <form action="download.php" method="post">
                            <input type="hidden" name="" value="">
                            <a href="" class="btn btn-primary">Download</a>
                        </form>
                    </td>
                </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>