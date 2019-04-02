<?php
// TODO: create a dynamically generated nav menu that will be retrieved from the database
?>
<header>
    <?php // TODO: logo placement ?>
    <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand px-2" href="#"><img src="<?= IMG ?>\images\Logo-05.png" alt="Humbie Helper Logo"
                id="nav__logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item px-2">
                    <?php
                      if (isset($_SESSION['username'])) :
                    ?>
                    <a class="nav-link" href="<?= RVIEWS;?>/student/user-profile.php">Hello, <?= $_SESSION['username'];?>!</a>
                    <?php
                      else:
                    ?>
                    <a class="nav-link" href="<?= RVIEWS."/student/add-student.php";?>">Register</a>
                    <?php
                      endif;
                    ?>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="<?= BASE;?>">Home</span></a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#">FAQ</a>
                </li>
                <li class="nav-item px-2">
                    <?php
                      if (isset($_SESSION['username'])) :
                    ?>
                    <a class="nav-link" href="<?= RVIEWS."/logout.php";?>">LOG OUT</a>
                    <?php
                      else:
                    ?>
                    <a class="nav-link" href="<?= BASE;?>">LOG IN</a>
                    <?php
                      endif;
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
