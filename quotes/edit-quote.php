<?php
include $_SERVER['DOCUMENT_ROOT'].'/bsb-humber-web-dev-assistant/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<body>
    <h2>Edit Quote/Author</h2>
    <form action="#" method="POST">
        <fieldset>
            <div>
                <label for="author">Quote Author: </label>
                <input type="text" name="author" />
            </div>
            <div>
                <label for="content">Quote: </label>
                <input type="text" name="content" /><br />
            </div>
            <input type="submit" name="editquote" value="Edit Quote">
        </fieldset>
    </form>
</body>