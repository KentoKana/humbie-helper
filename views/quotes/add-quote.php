<?php
include $_SERVER['DOCUMENT_ROOT'].'/bsb-humber-web-dev-assistant/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<body>
    <h2>Add a New Quote</h2>
    <form action="#" method="POST">
        <fieldset id="form">
            <div>
                <label for="author">Quote Author: </label>
                <input type="text" name="author" />
            </div>
            <div>
                <label for="content">Quote: </label>
                <input type="text" name="content" /><br />
            </div>
            <input type="submit" name="addquote" value="Add Quote">
        </fieldset>
    </form>
</body>