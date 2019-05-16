<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(MODELS.'/Database.php');
require_once(MODELS.'/Student.php');
require_once(LIB. '/functions.php');

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
    //I'll find a better way to check if the inputs are invalid. -Kento.
    if ($setFName !== false &&
        $setLName !== false &&
        $setEmail !== false &&
        $setPhone !== false &&
        $setUsername !== false &&
        $setPassword !== false
    ) {
        try {
            $student->addStudent($fname, $lname, $email, $phone, $username, $password);

            //Once student is registered, user is automatically logged in as that registered student.
            $_SESSION['username'] = $username;
            //Get last inserted ID
            //https://stackoverflow.com/questions/10680943/pdo-get-the-last-id-inserted
            $_SESSION['studentId'] = Database::getDatabase()->lastInsertId();
            header("Location:". RVIEWS ."/student/user-profile.php");
        } catch (PDOException $e){
            // header("Location: /project-backstreet-boys-and-jenna?addStat=failure");
            echo $e;
        }
    }
}

/*------ Edit Student Logic ---------*/
// N.B. Cannot change username once set.
if (isset($_POST['editStudent'])) {
    $student->setFName($_POST['fname']);
    $student->setLName($_POST['lname']);
    $student->setEmail($_POST['email']);
    $student->setPhone($_POST['phone']);
    $password = "";

    //If password field is left empty in the edit view, get the existing password of the user.
    //Otherwise, set a new password.
    //https://stackoverflow.com/questions/9154719/check-whether-post-value-is-empty
    if(trim($_POST['password']) === "") {
        $password = $student->getStudentPass($_SESSION['username'])[0];

        //var_dump($password);
     } else {
        $student->setPassword($_POST['password']);
        $password = $student->getPassword();
    }

    // Assign var to post items
    $fname = $student->getFName();
    $lname = $student->getLName();
    $email = $student->getEmail();
    $phone = $student->getPhone();
    // $username = $student->getUsername();

    //ID from URL Querystring
    $id = $_SESSION['studentId'];
    //Try catch for updating student.
    try {
        $student->updateStudent($fname, $lname, $email, $phone, $password, $id);
        header("Location:". RVIEWS ."/student/edit-student.php?id=" . $id . "&updateStat=success");

    } catch (PDOException $e){
        header("Location:". RVIEWS ."/student/edit-student.php?id=" . $id . "&updateStat=failure");
        // echo $e;
    }
}

/*------ Delete Student Logic ---------*/
if (isset($_POST['deleteStudent'])) {
    $id = $_POST['delId'];
    $student->deleteStudent($id);
    header("Location:". RVIEWS ."/student/list-students.php" . "?delStat=success");
}

?>
