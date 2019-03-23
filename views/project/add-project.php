<?php require './../../config.php';
include VIEWS.'/header.php';
//require_once CONTROLLERS.'/student-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once LIB . '/functions.php';
require_once MODELS . '/Database.php';
require_once  MODELS .'/Project.php';

//Hi Jenna, 
//I changed the session to studentId instead of student_id since that was the name of my session.
//Thanks! -Kento

$_SESSION['studentId'];

  if(isset($_POST['addProj'])){
    $project_name = $_POST['project-name'];
    $project_description = $_POST['project-description'];
    $student_id = $_SESSION['studentId'];
    $db = Database::getDatabase();
    $p = new Project();
    $c = $p->addProject($project_name, $project_description, $student_id, $db);
    header('Location:list-projects.php');
  }


?>

<main id="jg-main" class="m-4">
    <div class="text-center p-3">
        <h1>Add New Project</h1>
        <div class="p-4">
            <form action="" method="POST" class="m-4">
                <div>
                    <label for="project-name">Project Name:</label>
                </div>
                <div>
                    <input type="text" class="form__input-field" name="project-name">
                </div>
                <div>
                    <label for="project-description">Project Description:</label>
                </div>
                <div>
                    <textarea class="form__textarea" name="project-description"></textarea>
                </div>
                <button class="jg-button-primary" name="addProj" type="submit">Submit</button>
            </form>
        </div>

    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
