<?php
require_once MODELS . '/Student.php';
$s = new Student(Database::getDatabase());

$errorMsg = "";

if (isset($_POST['login'])) {
    $s->setUsername($_POST['username']);

    $storedPass = $s->getStudentPass($s->getUsername())['password'];
        if(password_verify($_POST['password'], $storedPass) === false) {
            return $errorMsg = "The username and password does not match.";
        } else {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['studentId'] = $s->getStudentIdByUserName($_POST['username'])[0];
            //get student id as well!
            header("Location:". RVIEWS ."/student/user-profile.php");
        }
}

//get username and password input
//compare against database
//if there is a match, set session['userid'] and redirect to profile view.
//if there is no match (ie null result), return error message.
?>
