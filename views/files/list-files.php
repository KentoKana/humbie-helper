<?php require './../../config.php';
require_once CONTROLLERS.'/upload-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$projectId = $_SESSION['project_id'];
require_once VIEWS.'/header.php';
?>
<main class="filler p-5">
    <div id="jg-main" class="container">
        <h1 class="text-center p-5">All Files</h1>
        <div class="col-md-12">
          <a href="upload-files.php" class="jg-add-details btn">Upload New File</a>
          <div class="text-center py-2">
              <table class="table">
                  <thead class="jg_table__thead">
                      <tr>
                          <th> Upload Name </th>
                          <th> File Name </th>
                          <th> Date Uploaded </th>
                          <th> Download </th>
                          <th> Delete </th>
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
                              <form action="" method="post">
                                  <input type="hidden" name="id" value="<?php echo $file['id']; ?>">
                                  <a href="download-file.php?id=<?php echo $file['id'];?>" class="jg-add-details btn">Download</a>
                              </form>
                          </td>
                          <td>
                              <form action="" method="post">
                                  <input type="hidden" name="id" value="<?php echo $file['id']; ?>">
                                  <a href="delete-file.php?id=<?php echo $file['id'];?>" class="jg-add-details btn">Delete</a>
                              </form>
                          </td>
                      </tr>
                      <?php
                      }
                      ?>
                  </tbody>
              </table>
          </div>
        </div>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>
