<?php
require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/project-controller.php';

$_SESSION['project_id'];


?>


<main id="jg-main" class="m-4">
    <h1 class="text-center m-3">Student List</h1>
    <div class="text-center p-5">
      <div class="text-danger text-center pt-3"><?=$errormsg?></div>
      <form action="#" method="POST">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th> Select </th>
                    <th> First Name </th>
                    <th> Last Name </th>
                </tr>
                    <?php
                    $project->listStudents($db);
                    foreach ($project->listStudents($db) as $row) {
                        echo "<tr>" .
                        "<td> <input type='checkbox' name='student_id[]' value='$row->id'> </td>" .
                        "<td class='m-3'>" . $row->student_fname . "</td>" .
                        "<td>" . $row->student_lname . "</td>" .
                        "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <button class="jg-button-primary" name="addStudents" type="submit">Add Students</button>
        </form>
    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
