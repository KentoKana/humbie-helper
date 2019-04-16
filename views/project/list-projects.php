<?php
require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/project-controller.php';

//require_once CONTROLLERS.'/student-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


$student_id = $_SESSION['studentId'];

$projects = $project->listProjects($student_id, $db);


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
                          <input class='jg-table__button' type='submit' name='delete' value='Delete Project' />
                        </form>
                    </td>
                </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
