<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../../models/Database.php');
require_once('../../models/Student.php');

$student = new Student(Database::getDatabase());

/*------ Add Student Logic ---------*/
if (isset($_POST['addStudent'])) {

    // //set student information
    $student->setFName($_POST['fname']);
    $student->setLName($_POST['lname']);
    $student->setEmail($_POST['email']);
    $student->setPhone($_POST['phone']);
    $student->setUsername($_POST['username']);
    $student->setPassword($_POST['password']);

    // Assign var to post items
    $fname = $student->getFName();
    $lname = $student->getLName();
    $email = $student->getEmail();
    $phone = $student->getPhone();
    $username = $student->getUsername();
    $password = $student->getPassword();

    //Execute Add Student

    try {
        $student->addStudent($fname, $lname, $email, $phone, $username, $password);    
        header("Location:/views/student/list-students.php" . "?addStat=success");
    } catch (PDOException $e){
        header("Location:/views/student/list-students.php?id=" . "?addStat=failure");
    }
}

if (isset($_POST['editStudent'])) {
    $student->setFName($_POST['fname']);
    $student->setLName($_POST['lname']);
    $student->setEmail($_POST['email']);
    $student->setPhone($_POST['phone']);
    $student->setUsername($_POST['username']);
    $student->setPassword($_POST['password']);

    // Assign var to post items
    $fname = $student->getFName();
    $lname = $student->getLName();
    $email = $student->getEmail();
    $phone = $student->getPhone();
    $username = $student->getUsername();
    $password = $student->getPassword();

    //ID from URL Querystring
    $id = $_GET['id'];
    
    //Try catch for updating student.
    try {
        $student->updateStudent($fname, $lname, $email, $phone, $username, $password, $id);
        header("Location:/views/student/edit-student.php?id=" . $_GET['id'] . "&updateStat=success");
    } catch (PDOException $e){
        header("Location:/views/student/edit-student.php?id=" . $_GET['id'] . "&updateStat=failure");
    }
}

/*------ Delete Student Logic ---------*/
if (isset($_POST['deleteStudent'])) {
    $id = $_POST['delId'];
    $student->deleteStudent($id);    
}

?>