<?php
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
require_once('../../controllers/student-controller.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
// echo $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>

<main id="add-student-main">
    <h1 class="text-center m-3">Register Student</h1>
    <div class="form form-group text-center">
        <form action="" method="POST">
            <div class="mt-2">
                <div>
                    <label for="form__fname">First Name:</label>
                </div>
                <input type="text" id="form__fname" class="form__input text-center" name="fname"
                    placeholder="First Name">
            </div>
            <div class="mt-2">
                <div>
                    <label for="form__lname">Last Name:</label>
                </div>
                <input type="text" id="form__lname" class="form__input text-center" name="lname"
                    placeholder="Last Name">
            </div>
            <div class="mt-2">
                <div>
                    <label for="form__email">Email:</label>
                </div>
                <input type="text" id="form__email" class="form__input text-center" name="email" placeholder="Email">
            </div>
            <div class="mt-2">
                <div>
                    <label for="form_phone">Phone Number:</label>
                </div>
                <input type="text" id="form__phone" class="form__input text-center" name="phone"
                    placeholder="Phone Number">
            </div>
            <div class="mt-2">
                <div>
                    <label for="form__username">Username:</label>
                </div>
                <input type="text" id="form__username" class="form__input text-center" name="username"
                    placeholder="Username">
            </div>
            <div class="mt-2">
                <div>
                    <label for="form__password">Password:</label>
                </div>
                <input type="password" id="form__password" class="form__input text-center" name="password"
                    placeholder="Password">
            </div>
            <div>
                <button class="m-3" type="submit" name="addStudent">Add Student!</button>
            </div>
        </form>
    </div>
</main>

<?php include '../../footer.php'; ?>