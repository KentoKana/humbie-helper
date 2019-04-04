<?php
require_once '../../config.php';
require_once VIEWS . '/header.php';
require_once CONTROLLERS . '/quote-controller.php';
require_once MODELS . '/quote_db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main id="jg-main" class="m-4">
    <h1 class="m-3">List of Quotes</h1>
    <a href="add-quote.php" class="btn btn-primary">Add Quote</a>
    <div class="text-center p-5">
        <table class="table">
            <tr>
                <th>Author</th>
                <th>Quote</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach($myquote as $quote){?>
            <tr>
                <td><?php echo $quote->quote_author ?></td>
                <td><?php echo $quote->quote ?></td>
                <td><form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $quote->id ?>">
                <a href="delete-quote.php?id=<?php echo $quote->id;?>" class="btn btn-primary">Delete</a>
                </form></td>
                <td><form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $quote->id ?>">
                <a href="edit-quote.php?id=<?php echo $quote->id;?>" class="btn btn-primary">Edit</a>
                </form></td>
            </tr>
            <?php }?>
        </table>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>