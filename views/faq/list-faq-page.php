<?php require './../../config.php';
include VIEWS.'/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<main id="jg-main" class="m-4">

  <div class="container text-center m-0 px-3 py-2">
    <div class="row">
      <div id="jg-side-column" class="col-3 p-0">
        <h1 class="text-center mt-5"> Categories </h1>
          <ul>
            <li> <a href=""> Category 1 </a> </li>
            <li> <a href=""> Category 2 </a> </li>
            <li> <a href="">Category 3 </a> </li>
            <li> <a href=""> Category 4 </a> </li>
            <li> <a href=""> Category 5 </a> </li>
          </ul>
      </div>
      <div class="col-9">
      <h1 class="text-center py-3"> FAQ Category Name </h1>
        <div id="accordion">
          <div class="card">
            <div class="card-header jg-accordion__header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Question 1
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                Answer Content 1
            </div>
          </div>
        </div>
          <div class="card">
            <div class="card-header jg-accordion__header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Question 2
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                Answer Content 2
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header jg-accordion__header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Question 3
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                Answer content 2
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

</main>

<?php include VIEWS.'/footer.php'; ?>
