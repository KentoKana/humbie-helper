<?php
/*
* Page name:
* Author:
*/
// TODO: user design and functionality
require 'config.php';
//if user is logged in, redirect to user's profile instead of the login page.
if (isset($_SESSION['username'])) {
    header("Location:". RVIEWS ."/student/user-profile.php");
}
require_once CONTROLLERS.'/home-controller.php';
require_once VIEWS.'/header.php';
?>

<div>
    <?php
    if (isset($_GET['addStat'])) {
      if ($_GET['addStat'] === "failure") {
        //echo genStatusMsg("danger", "Something went wrong! Please try again later.");
      }
    }
    ?>
</div>

<div class="container">
    <main id="jg-main" class="d-flex align-content-center justify-content-center flex-wrap h-100 m-4">
        <div class="row">
            <div class="col-md-12 text-center m-4 mb-0">
                <h1>Welcome to Humbie Helper!</h1>
            </div>
            <div class="col-sm-10 col-md-6 mx-auto border bg-light rounded text-center m-4">
                <h2 class="m-2">Log In</h2>
                <span class="text-danger"><?php echo $errorMsg;?></span>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="user-input">Username: </label>
                        <input type="text" name="username" class="form__input-field form-control" id="user-input"
                            placeholder="Username"
                            value="<?php if(isset($_POST['login'])) { echo $_POST['username']; }?>">
                    </div>
                    <div class="form-group">
                        <label for="password-input">Password: </label>
                        <input type="password" name="password" class="form__input-field form-control"
                            id="password-input" placeholder="Password"
                            value="<?php if(isset($_POST['login'])) { echo $_POST['password']; }?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="form__submit-button" class="btn btn-primary" name="login">Log
                            In</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<?php include VIEWS.'/footer.php'; ?>
