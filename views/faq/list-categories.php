<?php require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/faq-controller.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);



if(isset($_POST['edit'])){
  $_SESSION['note_id'] = $_POST['note_id'];
  header('Location:edit-category.php');
}





$categories= $ca->get_categories($db);

?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">All Categories</h1>
  <div class="text-danger text-center pt-3"><?=$errormsg?></div>
    <div class="text-center px-5 py-2">
      <table class="table">
        <tbody>
          <thead class="jg_table__thead">
            <tr>
              <th> Category Name </th>
              <th> Edit </th>
              <th> Delete </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($categories as $category):?>
            <tr class="jg_table__tbody">
              <td> <?=$category->category_name?></td>
              <td>
                <form action="" method="POST">
                  <input type='hidden' name='cat_id'value='<?=$category->id?>'/>
                  <input class='jg-table__button' type='submit' name='edit' value='Edit Category' />
                </form>
              </td>
              <td>
                <form action="" method="POST">
                  <input type='hidden' name='cat_id' value='<?=$category->id?>'/>
                  <input type='submit' class='jg-table__button' name='delete' value='Delete Category'/>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </tbody>
      </table>
      <button class='jg-button-primary' type="button"><a href="add-category.php">Add New</a></button>
    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
