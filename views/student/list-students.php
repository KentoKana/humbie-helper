<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../../controllers/student-controller.php');
include '../../header.php';
?>

<!--If GET is set for updateStat, display this content.  -->
<div>
    <?php
        if (isset($_GET['addStat'])) {
            if ($_GET['addStat'] === "success") {
                echo Student::genStatusMsg("success","Your profile has been added!");
            } else {
                echo Student::genStatusMsg("danger", "Something went wrong! Please try again later.");
            }
        }
        ?>
</div>

<main id="index-listStudents">
    <h1>Student List</h1>
    <div>
        <table>
            <tbody>
                <tr>
                    <th> Student First Name </th>
                    <th> Student Last Name </th>
                    <th> Student Email </th>
                    <th> Student Phone Number </th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <form action="#" method="POST">
                    <?php 
                    $student->listStudents();
                    foreach ($student->listStudents() as $row) {
                        echo "<tr>" .
                        "<td>" . $row['student_fname'] . "</td>" . 
                        "<td>" . $row['student_lname'] . "</td>" . 
                        "<td>" . $row['student_email'] . "</td>" .
                        "<td>" . $row['student_phone'] . "</td>" . 
                        "<td>" . "<a href='/views/student/edit-student.php?id=" . $row['id'] . "'>Edit</a></td>" . 
                        "<input type='hidden' name='delId' value='" . $row['id'] . "'>" .
                        "<td>" . "<button type='submit' name='deleteStudent'>Delete</button></td>" . 
                        "</tr>";
                    }
                ?>
                </form>
            </tbody>
        </table>
    </div>
</main>


<?php include '../../footer.php'; ?>