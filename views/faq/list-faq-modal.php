<?php require './../../config.php';
include VIEWS.'/header.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);



?>

<div id="jg-main" class="m-4 p-5">
    <button id="jg-humbie-button" type="button" class="jg-button-primary position-absolute" data-toggle="modal" data-target="#exampleModal">
       Need help?
    </button>
  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <button id="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body">
          <div class="jg-hippo-sprite p-3 mb-3">
              <div id="jg-hippo-sprite__image"></div>
              <p id="jg-hippo-sprite__text"> Hi! I'm Humbie, how can I help you? </p>
          </div>
          <div class="row">
    <div class="col-3">
      <h2 class="jg_modal__title"> Categories </h2>
      <ul class="jg_faq__ul">
        <?php foreach($categories as $category):?>
          <li id="<?=$category->id?>"> <?=$category->category_name?> </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="col-9">
      <ul class="faqs">
      </ul>
    </div>
  </div>
        </div>
      </div>
    </div>
  </div>
  </div>

<?php include VIEWS.'/footer.php'; ?>
