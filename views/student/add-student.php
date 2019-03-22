<?php
require '../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/student-controller.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<main id="jg-main" class="m-4">
    <h1 class="text-center m-3">Register Student</h1>
    <p class="text-center">Fields marked with <span class="text-danger">*</span> are required fields.</p>
    <div class="form form-group text-center">
        <form action="" method="POST">

            <div class="mt-2">
            <!-- First Name -->
                <div>
                    <label for="form__fname"><span class="text-danger">*</span>First Name:</label>
                </div>
                <input type="text" id="form__fname" class="form__input text-center" name="fname"
                    value="<?php if(isset($_POST['addStudent'])) { echo $_POST['fname'];}?>" placeholder="First Name">
                <?php if(isset($_POST['addStudent'])) {echo Student::validateData($student->setFName($_POST['fname']), "Invalid First Name." );} ?>
            </div>

            <div class="mt-2">
            <!-- Last Name -->
                <div>
                    <label for="form__lname"><span class="text-danger">*</span>Last Name:</label>
                </div>
                <input type="text" id="form__lname" class="form__input text-center" name="lname"
                    value="<?php if(isset($_POST['addStudent'])) { echo $_POST['lname'];}?>" placeholder="Last Name">
                <?php if(isset($_POST['addStudent'])) {echo Student::validateData($student->setLName($_POST['lname']), "Invalid Last Name." );} ?>

            </div>

            <div class="mt-2">
            <!-- Email -->
                <div>
                    <label for="form__email"><span class="text-danger">*</span>Email:</label>
                </div>
                <input type="text" id="form__email" class="form__input text-center" name="email" placeholder="Email"
                    value="<?php if(isset($_POST['addStudent'])) { echo $_POST['email'];}?>">
                <?php if(isset($_POST['addStudent'])) {echo Student::validateData($student->setEmail($_POST['email']), "Invalid E-Mail Address." );} ?>
            </div>

            <div class="mt-2">
            <!-- Phone Number -->
                <div>
                    <label for="form_phone"><span class="text-danger">*</span>Phone Number:</label>
                </div>
                <input type="text" id="form__phone" class="form__input text-center" name="phone"
                    placeholder="Phone Number" value="<?php if(isset($_POST['addStudent'])) { echo $_POST['phone'];}?>">
                <?php if(isset($_POST['addStudent'])) {echo Student::validateData($student->setPhone($_POST['phone']), "Invalid Phone Number" );} ?>

            </div>

            <div class="mt-2">
            <!-- Username -->
                <div>
                    <label for="form__username"><span class="text-danger">*</span>Username:</label>
                </div>
                <input type="text" id="form__username" class="form__input text-center" name="username"
                    placeholder="Username" value="<?php if(isset($_POST['addStudent'])) { echo $_POST['username'];}?>">
                <?php if(isset($_POST['addStudent'])) {echo Student::validateData($student->setUsername($_POST['username']), "Invalid Username" );} ?>

            </div>

            <div class="mt-2">
            <!-- Password -->
                <div>
                    <label for="form__password"><span class="text-danger">*</span>Password:</label>
                </div>
                <input type="password" id="form__password" class="form__input text-center" name="password"
                    placeholder="Password" value="<?php if(isset($_POST['addStudent'])) { echo $_POST['password'];}?>">
                <?php if(isset($_POST['addStudent'])) {echo Student::validateData($student->setPassword($_POST['password']), "Invalid Password" );} ?>

            </div>

            <!-- Submit Button -->
            <div>
                <button class="m-3" type="submit" name="addStudent">Add Student!</button>
            </div>
        </form>
    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>