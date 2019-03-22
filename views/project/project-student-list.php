<?php
require './../../config.php';
include VIEWS.'/header.php';
//require_once CONTROLLERS.'/student-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once LIB . '/functions.php';
require_once MODELS . '/Database.php';
require_once  MODELS .'/Project.php';

$db = Database::getDatabase();
$p = new Project();

$_SESSION['project_id'];

if(isset($_POST['addStudents'])){
  $project_id = $_SESSION['project_id'];
  $student_id = $_POST['student_id'];
  foreach($student_id as $s_id){
    $c = $p->addStudentsToProject($project_id,$s_id, $db);
  }
  if($c){
    header('Location:project-details.php');
  }else{
    echo "Problem adding students";
  }

//var_dump ($student_id);

}



?>


<main id="jg-main" class="m-4">
    <h1 class="text-center m-3">Student List</h1>
    <div class="text-center p-5">
      <form action="#" method="POST">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th> Select </th>
                    <th> First Name </th>
                    <th> Last Name </th>
                </tr>
                    <?php
                    $p->listStudents($db);
                    foreach ($p->listStudents($db) as $row) {
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
