<?php
require '../../config.php';
include VIEWS.'/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="container filler">
    <h2 class="my-4">Edit Announcement</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="form__username-field">Announcement: </label>
            <input type="text" class="form__username-field form-control" id="form__username-field">
        </div>
        <div class="form-group">
        <label for="project_list">Projects (hold <kbd>ctrl</kbd> or <kbd>command ⌘</kbd> key to select multiple projects)</label>
        <select multiple class="form-control" name="project_list">
            <option>Project 1</option>
            <option>Project 2</option>
            <option>Project 3</option>
        </select>
        </div>
        <div class="form-group">
            <button type="submit" id="form__submit-button" class="btn btn-primary">Submit</button>
        </div>
    </form>
</main>
<?php include VIEWS.'/footer.php'; ?>
