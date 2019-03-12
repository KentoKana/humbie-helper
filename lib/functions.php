<?php
	//Generate Status Message Method
	//Uses Bootstrap4 alert box
	function genStatusMsg($status, $msg) {
		return 
		"<div class='alert alert-$status alert-dismissible fade show text-center' role='alert'>
        <!-- https://www.google.com/search?q=starwars+yoda+icon&client=firefox-b-d&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiioN_9yeTgAhUFxYMKHRsbDjcQ_AUIDigB&biw=1368&bih=798#imgrc=ojPC25Xvl59jmM: -->
        <img src='../../assets/images/Humbie.png' width='50' alt='humbie icon'> $msg
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div> ";
	}
?>