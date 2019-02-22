<?php
/*
* Page name:
* Author:
*/
// TODO: user design and functionality
include 'header.php';
?>
<main id="index-main">
	<h1>Welcome to Humbie Helper!</h1>
	<div class="jumbotron">
		<h2 class="text-center">Log In</h2>
		<form class="col-md-12 text-center pagination-center">
			<div>
				<label for="form__username-field">Username: </label>
				<input type="text" class="form__username-field" id="form__username-field" placeholder="Username">
			</div>
			<div>
				<label for="form__username-field">Password: </label>
				<input type="text" class="form__password-field" id="form__password-field" placeholder="Password">
			</div>
			<div>
				<button type="submit" id="form__submit-button">Log In</button>
			</div>
		</form>
	</div>


</main>
<?php include 'footer.php'; ?>
