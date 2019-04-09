<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once MODELS . '/announcement_db.php';
require_once CONTROLLERS . '/announcement-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<main class="container filler">
    <h1>List of Announcements</h1>
    <a href="add-announcement.php" class="btn btn-primary">Add Announcement</a>
    <table class="table">
        <tr>
            <th>Author</th>
            <th>Time</th>
            <th>Announcement</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($myannounce as $announcement) {?>
        <tr>
            <td><?php $announce->announcement_time ?></td>
            <td><?php $announce->announcement ?></td>
            <td></td>
            <td><?php echo $announcement->content ?></td>
            <td><form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php //echo $announcement->id ?>">
            <input type="submit" value="Delete" class="btn btn-primary" />
            </form></td>
            <td><form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php //echo $announcement->id ?>">
            <input type="submit" value="Edit" class="btn btn-primary"/>
            </form></td>
        </tr>
        <?php }?>
    </table>
</main>
<?php include VIEWS.'/footer.php'; ?>