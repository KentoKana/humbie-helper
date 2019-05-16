<?php
require_once '../../config.php';
require_once CONTROLLERS . '/quote-controller.php';
require_once MODELS . '/quote_db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once VIEWS . '/header.php';
?>
<main>
<div id="jg-main" class="container">
    <h1 class="text-center p-5">List of Quotes</h1>
    <a href="add-quote.php" class="jg-add-details btn">Add Quote</a>
    <div class="text-center p-5">
        <table class="table">
            <tr class="jg_table__thead">
                <th>Author</th>
                <th>Quote</th>
                <th></th>
                <th></th>
            </tr>
            <!-- myquote is select * from quotes query-->
            <?php foreach($myquote as $quote){?>
            <tr>
                <td><?php echo $quote->quote_author ?></td>
                <td><?php echo $quote->quote ?></td>
                <td><form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $quote->id ?>">
                <a href="delete-quote.php?id=<?php echo $quote->id;?>" class="jg-add-details btn">Delete</a>
                </form></td>
                <td><form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $quote->id ?>">
                <a href="edit-quote.php?id=<?php echo $quote->id;?>" class="jg-add-details btn">Edit</a>
                </form></td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>
</main>
<?php include VIEWS.'/footer.php'; ?>
