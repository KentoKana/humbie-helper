<?php
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
require_once('../../controllers/student-controller.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
// echo $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>

<main id="add-student-main">
    <h1 class="text-center m-3">Student Name</h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="pills-currentProjects-tab" data-toggle="pill"
                                href="#pills-currentProjects" role="tab" aria-controls="pills-currentProjects"
                                aria-selected="false">Current Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-yourInfo-tab" data-toggle="pill" href="#pills-yourInfo"
                                role="tab" aria-controls="pills-yourInfo" aria-selected="false">Your Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-timesheet-tab" data-toggle="pill" href="#pills-timesheet"
                                role="tab" aria-controls="pills-timesheet" aria-selected="false">Timesheet</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="tab-content m-2" id="pills-tabContent">

                    <!-- Current Projects Tab  -->
                    <div class="tab-pane fade show active" id="pills-currentProjects" role="tabpanel"
                        aria-labelledby="pills-currentProjects-tab">

                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item" style="background-color: lightCyan"><a href="#">&plus; Start
                                        A New Project</a></li>
                            </ul>

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><a href="#">Project Management</a></td>
                                        <td><a href="#">&times;</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Web Application Development </a></td>
                                        <td><a href="#">&times;</a></td>

                                    </tr>
                                    <tr>
                                        <td><a href="#">Mobile Development</a></td>
                                        <td><a href="#">&times;</a></td>

                                    </tr>
                                    <tr>
                                        <td><a href="#">Security and Quality Assurance</a></td>
                                        <td><a href="#">&times;</a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Your Info Tab  -->
                    <div class="tab-pane fade" id="pills-yourInfo" role="tabpanel" aria-labelledby="pills-yourInfo-tab">
                        <!-- Populate Data using sessions and student table -->
                    </div>

                    <!-- Timesheet Tab  -->
                    <div class="tab-pane fade" id="pills-timesheet" role="tabpanel"
                        aria-labelledby="pills-timesheet-tab">
                        <!-- Populate Data using sessions and timer table -->
                    </div>
                </div>
            </div>
        </div>


</main>

<?php include '../../footer.php'; ?>