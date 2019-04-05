<?php require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/faq-controller.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$categories = $ca->get_categories($db);





?>

<main id="jg-main" class="m-4">

  <div class="container text-center m-0 px-3 py-2">
    <div class="row">
      <div id="jg-side-column" class="col-3 p-0">
        <h1 class="text-center mt-5"> Categories</h1>
          <ul class="jg_faq__ul">

          <?php foreach($categories as $category):?>
            <li id="<?=$category->id?>"> <?=$category->category_name?> </li>
          <?php endforeach; ?>

          </ul>
      </div>
      <div class="col-9">
        <ul class="questions_display">

        </ul>
      </div>
  </div>
</div>

</main>


<?php include VIEWS.'/footer.php'; ?>
