<?php require './../../config.php';
include VIEWS.'/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$path = './uploaded';
$files = scandir($path);

?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">All Files</h1>
  <a href="upload-files.php">Upload New File</a>
    <div class="text-center px-5 py-2">
      <table class="table">
        <tbody>
          <thead class="jg_table__thead">
            <tr>
              <th> File Name </th>
              <th> Date Uploaded </th>
              <th> Delete </th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($files as $file) { ?>
            <tr class="jg_table__tbody">
                <td><?php print_r($file)?></td>
                <td>Date</td>
                <td><form action="delete.php" method="post">
                        <input type="hidden" name="" value="">
                        <a href="" class="btn btn-primary">Delete</a>
                    </form>
                </td>
            </tr>
          <?php } ?>
          </tbody>
        </tbody>
      </table>
    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
