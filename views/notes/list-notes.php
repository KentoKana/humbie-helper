<?php require './../../config.php';
include VIEWS.'/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">All Notes</h1>
    <div class="text-center px-5 py-2">
      <table class="table">
        <tbody>
          <thead class="jg_table__thead">
            <tr>
              <th> Title </th>
              <th> Date Created </th>
              <th> Edit </th>
              <th> Delete </th>
            </tr>
          </thead>
          <tbody>
            <tr class="jg_table__tbody">
              <td> Test Note </td>
              <td> Test Date </td>
              <td> Edit </td>
              <td> Delete </td>
            </tr>
            <tr class="jg_table__tbody">
              <td> Test Note </td>
              <td> Test Date </td>
              <td> Edit </td>
              <td> Delete </td>
            </tr>
          </tbody>
        </tbody>
      </table>
    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
