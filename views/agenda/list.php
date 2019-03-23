<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once MODELS . '/Database.php';
require_once MODELS . '/Agenda.php';
require_once CONTROLLERS . '/agenda-controller.php';
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
        if($_GET['deleted'] == 'success')
        {
          echo genStatusMsg("success", "Successfully Deleted!");
        }
        else
        {
          echo genStatusMsg("danger", "Unknown error was encountered, please try again!");
        }
      }
    ?>
  </div>
  <div class="col-10 mx-auto my-5">
    <a href="add.php" class="btn btn-success float-right">Add new agenda</a>
    <h2>Agendas</h2>
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
          // this should be session but since our modules aren't integrated yet I using an Id tied to my user account
          $id = 7;
          echo generateList($id);
        ?>
      </tbody>
    </table>
  </div>
</div>
<?php require_once VIEWS . '/footer.php'; ?>
