<?php
include $_SERVER['DOCUMENT_ROOT'].'/bsb-humber-web-dev-assistant/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<body>
    <h2>Are you sure you want to delete this quote?</h2>
    <form action="#" method="POST">
        <fieldset>
            <ul>
               <li id="form__author_print"></li>
               <li id="form__quote_print"></li>
            </ul>
            <input type="submit" name="deletequote" value="Delete Quote">
        </fieldset>
    </form>
</body>