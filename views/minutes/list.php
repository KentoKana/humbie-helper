<?php require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once MODELS . '/Database.php';
require_once CONTROLLERS . '/minutes-controller.php';
require_once LIB . '/functions.php';
?>
<div class="container">
  <div id="msg">
    <?php
      if(isset($_GET['deleted']))
      {
        if($_GET['deleted'] == 'success')
        {
          echo genStatusMsg("success", "Successfully Deleted!");
        }
        else
        {
          echo genStatusMsg("danger", "Unknown error was encountered, please try again!");
        }
      }

      if(isset($_GET['added']))
      {
        if($_GET['added'] == 'success')
        {
          echo genStatusMsg("success", "Successfully Added!");
        }
        else
        {
          echo genStatusMsg("danger", "Unknown error was encountered, please try again!");
        }
      }

      if(isset($_GET['edited']))
      {
        if($_GET['edited'] == 'success')
        {
          echo genStatusMsg("success", "Successfully Edited!");
        }
        else
        {
          echo genStatusMsg("danger", "Unknown error was encountered, please try again!");
        }
      }
    ?>
  </div>
  <div class="col-10 mx-auto my-5">
    <a href="add.php" class="btn btn-success float-right">Add new minutes</a>
    <h2>Minutes</h2>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Title</th>
          <th scope="col" class="text-md-center">Date Created</th>
          <th scope="col" class="text-md-right">Options</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $project_id = $student_id = 0;
            $parameters = [];

            if(isset($_SESSION))
            {
              $project_id = $_SESSION['project_id'];
              $student_id = $_SESSION['studentId'];
              $params = [
                "pId" => $project_id,
                "sId" => $student_id,
                "db" => Database::getDatabase()
              ];
            }
           echo listM($params);
        ?>
      </tbody>
    </table>
  </div>
</div>
<?php require_once VIEWS . '/footer.php'; ?>
