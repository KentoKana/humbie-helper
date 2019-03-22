<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(MODELS.'/Student.php');
require_once(LIB. '/functions.php');
// $_POST['fname'] = null;
// $_POST['lname'] = null;
// $_POST['email'] = null;
// $_POST['phone'] = null;
// $_POST['username'] = null;
// $_POST['password'] = null;

$student = new Student(Database::getDatabase());

/*------ Add Student Logic ---------*/
if (isset($_POST['addStudent'])) {

    // //set student information
    $setFName = $student->setFName($_POST['fname']);
    $setLName = $student->setLName($_POST['lname']);
    $setEmail = $student->setEmail($_POST['email']);
    $setPhone = $student->setPhone($_POST['phone']);
    $setUsername = $student->setUsername($_POST['username']);
    $setPassword = $student->setPassword($_POST['password']);

    // Assign var to post items
    $fname = $student->getFName();
    $lname = $student->getLName();
    $email = $student->getEmail();
    $phone = $student->getPhone();
    $username = $student->getUsername();
    $password = $student->getPassword();

    //Execute Add Student
    if ($setFName !== false && 
        $setLName !== false &&
        $setEmail !== false &&
        $setPhone !== false &&
        $setUsername !== false &&
        $setPassword !== false
    ) {
        try {
            $student->addStudent($fname, $lname, $email, $phone, $username, $password);    
            header("Location:/project-backstreet-boys-and-jenna/views/student/list-students.php" . "?addStat=success");
        } catch (PDOException $e){
            // header("Location:/project-backstreet-boys-and-jenna/views/student/list-students.php" . "?addStat=failure");
            echo $e;
        }
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
        header("Location:/project-backstreet-boys-and-jenna/views/student/edit-student.php?id=" . $_GET['id'] . "&updateStat=success");
    } catch (PDOException $e){
        header("Location:/project-backstreet-boys-and-jenna/views/student/edit-student.php?id=" . $_GET['id'] . "&updateStat=failure");
        // echo $e;
    }
}

/*------ Delete Student Logic ---------*/
if (isset($_POST['deleteStudent'])) {
    $id = $_POST['delId'];
    $student->deleteStudent($id);    
    header("Location:/project-backstreet-boys-and-jenna/views/student/list-students.php" . "?delStat=success");
}

?>