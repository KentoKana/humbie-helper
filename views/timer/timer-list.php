<?php
require '../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/timer-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<main id="jg-main" class="m-4">
  <h1 class="text-center m-3">Student List</h1>
  <div class="text-center p-5">
    <table class="table table-striped">
      <tbody>
        <tr>
          <th> Task Name </th>
          <th> Hours Spent </th>
          <th> Date </th>
          <th> Delete </th>
        </tr>
        <form action="#" method="POST">
          <?php 
             $times = $t->timerListByProject($_GET['projectId'], $_SESSION['studentId']);
             // var_dump($times);
             foreach($times as $time ) {
             echo 
                "<tr>" . 
                    "<td>" . $time['task_name'] . "</td>" .
                    "<td>" . (string)round(($time['time_taken']/3600000), 2) . " Hrs </td>" .
                    "<td>" . $time['date_created'] . "</td>" . 
                    "<td> <button id='delTimeRecord' type='submit'> &times; </button> </td>".
                "</tr>" . 
                "<input type='hidden' name='timerId' value = '" . $time['id'] ."'>";
             }
          ?>
        </form>
      </tbody>
    </table>
  </div>
</main>
<?php include VIEWS.'/footer.php'; ?>
