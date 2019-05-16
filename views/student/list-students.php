<?php
require '../../config.php';

require_once CONTROLLERS.'/student-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once VIEWS.'/header.php';
?>

<main id="jg-main" class="m-4">
  <h1 class="text-center m-3">Student List</h1>
  <div class="text-center p-5">
    <table class="table table-striped">
      <tbody>
        <tr>
          <th> First Name </th>
          <th> Last Name </th>
          <!-- <th> Email </th>
          <th> Phone Number </th> -->
          <th> Edit </th>
          <th> Delete </th>
        </tr>
        <form action="#" method="POST">
          <?php
          $student->listStudents();
          foreach ($student->listStudents() as $row) {
            echo "<tr>" .
            "<td class='m-3'>" . $row['student_fname'] . "</td>" .
            "<td>" . $row['student_lname'] . "</td>" .
            // "<td>" . $row['student_email'] . "</td>" .
            // "<td>" . $row['student_phone'] . "</td>" .
            "<td>" . "<a href='/project-backstreet-boys-and-jenna/views/student/edit-student.php?id=" . $row['id'] . "'>Edit</a></td>" .
            "<input type='hidden' name='delId' value='" . $row['id'] . "'>" .
            "<td>" . "<button type='submit' name='deleteStudent'>Delete</button></td>" .
            "</tr>";
          }?>
        </form>
      </tbody>
    </table>
  </div>
</main>
<?php include VIEWS.'/footer.php'; ?>
