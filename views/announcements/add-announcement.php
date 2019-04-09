<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once CONTROLLERS . '/announcement-controller.php';
require_once CONTROLLERS . '/project-controller.php';
require_once CONTROLLERS . '/student-controller.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<main class="container filler">
    <h2 class="my-4">Add New Announcement</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="form-group">
            <label for="form__username-field">Announcement: </label>
            <input type="text" class="form__username-field form-control" >
        </div>
        <div class="form-group">
        <label for="project_list">Select Project</label>
        <select multiple class="form-control" name="project_list">
            <?php foreach($projects as $project) {?>
            <option><?php $project->project_name; ?></option>
        </select>
        </div>
        <?php }?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="annouce">Submit</button>
        </div>
    </form>
</main>
<?php include VIEWS . '/footer.php'; ?>