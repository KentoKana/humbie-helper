<?php require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/project-controller.php';
$_SESSION['studentId'];

?>

<main id="jg-main" class="m-4">
    <div class="text-center p-3">
        <h1>Add New Project</h1>
        <div class="text-danger text-center pt-3"><?=$errormsg?></div>
        <div class="p-4">
            <form action="" method="POST" class="m-4">
                <div>
                    <label for="project-name">Project Name:</label>
                </div>
                <div>
                    <input type="text" class="form__input-field" name="project-name" value="<?php
                      if(isset($_POST['project-name'])){
                        echo $project_name;}
                        ?>"/>
                </div>
                <div>
                    <label for="project-description">Project Description:</label>
                </div>
                <div>
                    <textarea class="form-control"name="project-description" rows="3"><?php
                    if(isset($_POST['project-description'])){
                        echo $project_description;
                      }?></textarea>
                </div>
                <button class="jg-button-primary" name="addProj" type="submit">Submit</button>
            </form>
        </div>

    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
