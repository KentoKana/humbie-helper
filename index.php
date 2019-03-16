<?php
/*
* Page name:
* Author:
*/
// TODO: user design and functionality
include 'header.php';
?>
<div class="container">
    <main id="jg-main" class="d-flex align-content-center justify-content-center flex-wrap h-100 m-4">
        <div class="row">
            <div class="col-md-12 text-center m-4 mb-0">
                <h1>Welcome to Humbie Helper!</h1>
            </div>
            <div class="col-sm-4 mx-auto border bg-light rounded text-center m-4">
                <h2 class="m-2">Log In</h2>
                <form>
                    <div class="form-group">
                        <label for="user-input">Username: </label>
                        <input type="text" class="form__input-field form-control" id="user-input"
                            placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password-input">Password: </label>
                        <input type="text" class="form__input-field form-control" id="password-input"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="form__submit-button" class="btn btn-primary">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<?php include 'footer.php'; ?>