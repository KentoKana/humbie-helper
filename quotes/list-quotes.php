<?php
include $_SERVER['DOCUMENT_ROOT'].'/bsb-humber-web-dev-assistant/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<body>
    <h1>List of Quotes</h1>
    <p><a href="#">Add quote</a></p>
    <table>
        <tr>
            <th>Author</th>
            <th>Content</th>
        </tr>
        <?php foreach($myquote as $quote){?>
            <tr>
                <td><?php echo $quote->author ?></td>
                <td><?php echo $quote->content ?></td>
                <td><form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $quote->id ?>">
                <input type="submit" value="Delete" />
                </form></td>
                <td><form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $quote->id ?>">
                <input type="submit" value="Edit" />
                </form></td>
            </tr>
        <?php }?>
    </table>
</body>
