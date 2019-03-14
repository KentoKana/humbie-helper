<?php
/*
* Page name:
* Author:
*/
// TODO: user design and functionality
include 'header.php';
?>
<!-- <main id="index-main"> -->
<div class="container filler">
	<main class="d-flex align-content-center justify-content-center flex-wrap h-100">
		<div class="row">
			<div class="col-md-12 text-center my-5">
					<h1>Welcome to Humbie Helper!</h1>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6 mx-auto border bg-light rounded text-center">
				<header class="my-4">
					<h2>Log In</h2>
				</header>
				<form>
					<div class="form-group">
						<label for="form__username-field">Username: </label>
						<input type="text" class="form__username-field form-control" id="form__username-field" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="form__username-field">Password: </label>
						<input type="text" class="form__password-field form-control" id="form__password-field" placeholder="Password">
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
