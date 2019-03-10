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
                            <a class="nav-link active" id="pills-actions-tab" data-toggle="pill" href="#pills-actions"
                                role="tab" aria-controls="pills-actions" aria-selected="true">Actions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-currentProjects-tab" data-toggle="pill"
                                href="#pills-currentProjects" role="tab" aria-controls="pills-currentProjects"
                                aria-selected="false">Current Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-yourInfo-tab" data-toggle="pill" href="#pills-yourInfo"
                                role="tab" aria-controls="pills-yourInfo" aria-selected="false">Your Info</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="tab-content m-2" id="pills-tabContent">

                    <!-- Actions Tab  -->
                    <div class="tab-pane fade show active" id="pills-actions" role="tabpanel"
                        aria-labelledby="pills-actions-tab">
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush m-auto">
                                <li class="list-group-item"><a href="#">Create New Project</a></li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Vestibulum at eros</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Current Projects Tab  -->
                    <div class="tab-pane fade" id="pills-currentProjects" role="tabpanel"
                        aria-labelledby="pills-currentProjects-tab">

                        <div class="card" style="width: 18rem;">
                            <div class="card" style="width: 18rem;">
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item" style="background-color: lightCyan"><a href="#"> + Add
                                            Student to Project</a></li>
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
                                </ul>
                            </div>
                        </div>

                        <!-- Your Info Tab  -->
                        <div class="tab-pane fade" id="pills-yourInfo" role="tabpanel"
                            aria-labelledby="pills-yourInfo-tab">
                            Your info tab here.
                        </div>
                    </div>
                </div>
            </div>


</main>

<?php include '../../footer.php'; ?>