<?php
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
require_once('../../controllers/student-controller.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<main id="edit-student-main">

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
    <main class="form form-group text-center">
        <h1 class="m-3">Update Student</h1>

        <form action="" method="POST">

            <div class="mt-2">
                <div>
                    <label for="form__fname">First Name:</label>
                </div>
                <input type="text" id="form__fname" class="form__input text-center" name="fname"
                    placeholder="First Name" value="<?= $student->getStudent($_GET['id'])['student_fname']; ?>">
            </div>

            <div class="mt-2">
                <div>
                    <label for="form__lname">Last Name:</label>
                </div>
                <input type="text" id="form__lname" class="form__input text-center" name="lname" placeholder="Last Name"
                    value="<?= $student->getStudent($_GET['id'])['student_lname']; ?>">
            </div>

            <div class="mt-2">
                <div>
                    <label for="form__email">Email:</label>
                </div>
                <input type="text" id="form__email" class="form__input text-center" name="email" placeholder="Email"
                    value="<?= $student->getStudent($_GET['id'])['student_email']; ?>">
            </div>

            <div class="mt-2">
                <div>
                    <label for="form_phone">Phone Number:</label>
                </div>
                <input type="text" id="form__phone" class="form__input text-center" name="phone"
                    placeholder="Phone Number" value="<?= $student->getStudent($_GET['id'])['student_phone']; ?>">
            </div>

            <div class="mt-2">
                <div>
                    <label for="form__username">Username:</label>
                </div>
                <input type="text" id="form__username" class="form__input text-center" name="username"
                    placeholder="Username" value="<?= $student->getStudent($_GET['id'])['username']; ?>">
            </div>

            <div class="mt-2">
                <div>
                    <label for="form__password">Password:</label>
                </div>
                <input type="password" id="form__password" class="form__input text-center" name="password"
                    placeholder="Password">
            </div>

            <div>
                <button class="m-3" type="submit" name="editStudent">Update!</button>
            </div>
        </form>
    </main>
</main>
<?php include '../../footer.php'; ?>