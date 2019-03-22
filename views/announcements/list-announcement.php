<?php
require_once '../../header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="container filler">
    <h1>List of Announcements</h1>
    <input type="submit" value="Add Announcement" class="btn btn-primary" />
    <table class="table">
        <tr>
            <th>Author</th>
            <th>Time</th>
            <th>Announcement</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php //foreach($myquote as $quote){?>
        <tr>
            <td>Billy</td>
            <td>12:00 p.m.</td>
            <td>Test Announcement 1</td>
            <td><?php //echo $announcement->content ?></td>
            <td><form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php //echo $announcement->id ?>">
            <input type="submit" value="Delete" class="btn btn-primary" />
            </form></td>
            <td><form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php //echo $announcement->id ?>">
            <input type="submit" value="Edit" class="btn btn-primary"/>
            </form></td>
        </tr>
        <tr>
            <td>Abbey</td>
            <td>1:30 p.m.</td>
            <td>Test Announcement 2</td>
            <td><?php //echo $announcement->content ?></td>
            <td><form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php //echo $announcement->id ?>">
            <input type="submit" value="Delete" class="btn btn-primary" />
            </form></td>
            <td><form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php //echo $announcement->id ?>">
            <input type="submit" value="Edit" class="btn btn-primary"/>
            </form></td>
        </tr>
        <tr>
            <td>Dave</td>
            <td>3.34 p.m.</td>
            <td>Test Announcement 3</td>
            <td><?php //echo $announcement->content ?></td>
            <td><form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php //echo $announcement->id ?>">
            <input type="submit" value="Delete" class="btn btn-primary" />
            </form></td>
            <td><form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php //echo $announcement->id ?>">
            <input type="submit" value="Edit" class="btn btn-primary"/>
            </form></td>
        </tr>
        <?php// }?>
    </table>
</main>
<?php require_once '../../footer.php'; ?>