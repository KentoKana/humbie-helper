<?php
require '../../config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once CONTROLLERS.'/student-controller.php';
if(!isset($_SESSION['username'])) {
    header("Location:/project-backstreet-boys-and-jenna");
}
// echo $student->getStudentPass($_SESSION['username'])[0];
$id = $_SESSION['studentId'];
require_once VIEWS.'/header.php';
?>

<main id="jg-main" class="m-4">

    <!--If GET is set for updateStat, display this content.  -->
    <div>
        <?php
        if (isset($_GET['updateStat'])) {
            if ($_GET['updateStat'] === "success") {
                echo genStatusMsg("success","Your profile has been updated!");
            } else {
                echo genStatusMsg("danger", "Something went wrong! Please try again later.");
            }
        }
        ?>
    </div>
    <div class="container">
      <div class="col-md-6 text-center mx-auto">
        <h1 class="m-3">Update Student</h1>

        <form action="" method="POST">

            <div class="mt-2 form-group">
                <div>
                    <label for="form__fname">First Name:</label>
                </div>
                <input type="text" id="form__fname" class="form__input text-center form-control" name="fname"
                    placeholder="First Name" value="<?= $student->getStudent($id)['student_fname']; ?>">
            </div>

            <div class="mt-2 form-group">
                <div>
                    <label for="form__lname">Last Name:</label>
                </div>
                <input type="text" id="form__lname" class="form__input text-center form-control" name="lname" placeholder="Last Name"
                    value="<?= $student->getStudent($_SESSION['studentId'])['student_lname']; ?>">
            </div>

            <div class="mt-2 form-group">
                <div>
                    <label for="form__email">Email:</label>
                </div>
                <input type="text" id="form__email" class="form__input text-center form-control" name="email" placeholder="Email"
                    value="<?= $student->getStudent($id)['student_email']; ?>">
            </div>

            <div class="mt-2 form-group">
                <div>
                    <label for="form_phone">Phone Number:</label>
                </div>
                <input type="text" id="form__phone" class="form__input text-center form-control" name="phone"
                    placeholder="Phone Number" value="<?= $student->getStudent($id)['student_phone']; ?>">
            </div>

            <div class="mt-2 form-group">
                <div>
                    <label for="form__password">Password:</label>
                </div>
                <input type="password" id="form__password" class="form__input text-center form-control" name="password"
                    placeholder="Password">
            </div>
            <div>
                <em>N.B. If you leave the password field blank, your password will not be updated.</em>
            </div>

            <div>
                <button class="m-3 jg-button-primary btn btn-lg" type="submit" name="editStudent">Update!</button>
            </div>
        </form>
      </div>
    </div>
</main>
<?php include VIEWS.'/footer.php'; ?>
