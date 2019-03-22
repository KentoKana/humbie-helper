<?php
require '../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/quote-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main class="container filler">
    <h1 class="my-4">List of Quotes</h1>
    <button type="submit" class="btn btn-primary">Add Quote</button>
    <table class="table">
        <tr>
            <th>Author</th>
            <th>Quote</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($myquote as $quote){?>
        <tr>
            <td><?php echo $quote->author ?></td>
            <td><?php echo $quote->content ?></td>
            <td><form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $quote->id ?>">
            <input type="submit" class="btn btn-primary" value="Delete" />
            </form></td>
            <td><form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $quote->id ?>">
            <input type="submit" class="btn btn-primary" value="Edit" />
            </form></td>
        </tr>
        <?php }?>
    </table>
</main>
<?php include VIEWS.'/footer.php'; ?>