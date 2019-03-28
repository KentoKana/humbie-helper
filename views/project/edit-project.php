<?php
require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/project-controller.php';
//require_once CONTROLLERS.'/student-controller.php';
$project_id = $_SESSION['project_id'];
$single_project= $project->singleProject($project_id, $db);
$description = $single_project->project_description;
$name = $single_project->project_name;


?>

<main id="jg-main" class="m-4">
    <div class="text-center p-3">
        <h1>Edit Project</h1>
        <div class="text-danger text-center pt-3"><?=$errormsg?></div>
        <div class="p-4">
            <form action="" method="POST" class="m-4">
                <div>
                    <label for="project-name">Project Name:</label>
                </div>
                <div>
                    <input type="text" class="form__input-field" name="edit-name" value="<?=$name?>">
                </div>
                <div>
                    <label for="project-description">Project Description:</label>
                </div>
                <div>
                    <textarea class="form-control" rows="3" name="edit-description"><?=$description?></textarea>
                </div>
                <button class="jg-form__submit" name="updateProj" type="submit">Submit</button>
            </form>
        </div>

    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
