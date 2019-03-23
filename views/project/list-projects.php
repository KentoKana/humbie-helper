<?php
require './../../config.php';
include VIEWS.'/header.php';
//require_once CONTROLLERS.'/student-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once LIB . '/functions.php';
require_once MODELS . '/Database.php';
require_once  MODELS .'/Project.php';


if(isset($_POST['edit'])){
  $_SESSION['project_id'] = $_POST['project_id'];
  header('Location: edit-project.php');
}

if(isset($_POST['details'])){
  $_SESSION['project_id'] = $_POST['project_id'];
  header('Location: project-details.php');
}

if(isset($_POST['delete'])){
  $_SESSION['project_id'] = $_POST['project_id'];
  header('Location: edit-project.php');
}



$_SESSION['student_id'] = 9;
$student_id = $_SESSION['student_id'];
$db = Database::getDatabase();
$p = new Project();
$projects = $p->listProjects($student_id, $db);


?>

<main id="jg-main" class="m-4">
    <div class="text-center p-3">
        <h1>Student Name's Projects</h1>
            <table class="table">
              <thead class="jg_table__thead">
                <tr>
                  <th>Project Name</th>
                  <th> Details </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($projects as $project):?>
                  <tr class="jg_table__tbody">
                    <td><?=$project->project_name?></td>
                    <td><form action="" method='post'>
                          <input type='hidden' name="project_id" value="<?=$project->id?>" />
                          <input class='jg-table__button' type='submit' name='details' value='Project Details' />
                        </form>
                    </td>
                    <td><form action="" method='post'>
                          <input type='hidden' name="project_id" value="<?=$project->id?>" />
                          <input class='jg-table__button' type='submit' name='edit' value='Edit Project' />
                        </form>
                    </td>
                    <td><form action="" method='post'>
                          <input type='hidden' name="project_id" value="<?=$project->id?>" />
                          <input class='jg-table__button' type='submit' name='Delete' value='Delete Project' />
                        </form>
                    </td>
                </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
