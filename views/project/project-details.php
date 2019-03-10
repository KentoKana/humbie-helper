<?php
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
require_once('../../controllers/student-controller.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
// echo $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>

<main id="add-student-main">
    <h1 class="text-center m-3">Project Name Here.</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-project-tab" data-toggle="pill" href="#pills-project"
                                role="tab" aria-controls="pills-project" aria-selected="true">Project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-announcements-tab" data-toggle="pill"
                                href="#pills-announcements" role="tab" aria-controls="pills-announcements"
                                aria-selected="false">Announcements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-students-tab" data-toggle="pill" href="#pills-students"
                                role="tab" aria-controls="pills-students" aria-selected="false">Students</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="tab-content m-2" id="pills-tabContent">

                    <!-- Project Tab  -->
                    <div class="tab-pane fade show active" id="pills-project" role="tabpanel"
                        aria-labelledby="pills-project-tab">
                        ...
                    </div>

                    <!-- Announcements Tab  -->
                    <div class="tab-pane fade" id="pills-announcements" role="tabpanel"
                        aria-labelledby="pills-announcements-tab">

                        <!-- Only display if admin session is set! -->
                        <div class="card" style="width: 18rem;">
                            <h5 class="card-title m-auto"><a href="#">+ Add An Announcement</a></h5>
                        </div>

                        <div class="card mt-2" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Project wireframes due</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Due date: March 27 2019</h6>
                                <p class="card-text">Requirements: Wireframes for each feature.</p>
                                <!-- <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a> -->
                            </div>
                        </div>

                        <div class="card mt-2" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Project proposal due</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Due date: March 21 2019</h6>
                                <p class="card-text">Requirements: Proposal for Bernard Monetto!</p>
                                <!-- <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Student Tab  -->
                    <div class="tab-pane fade" id="pills-students" role="tabpanel" aria-labelledby="pills-student-tab">
                        <div class="card" style="width: 18rem;">
                            <div class="card" style="width: 18rem;">
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item" style="background-color: lightCyan"><a href="#"> + Add
                                            Student to Project</a></li>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td><a href="#">Jenna BreenGerg</a></td>
                                                <td><a href="#">&times;</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Markus Martinez</a></td>
                                                <td><a href="#">&times;</a></td>

                                            </tr>
                                            <tr>
                                                <td><a href="#">Can't-o CanIZawa</a></td>
                                                <td><a href="#">&times;</a></td>

                                            </tr>
                                            <tr>
                                                <td><a href="#">Ryarn Robinsoup</a></td>
                                                <td><a href="#">&times;</a></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#helpfulTipsModal">
            Need Help?
        </button>

        <!-- Modal -->
        <div class="modal fade" id="helpfulTipsModal" tabindex="-1" role="dialog" aria-labelledby="helpfulTips"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="helpfulTips">Helpful Tips!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-auto">
                        <div class="col m-auto">
                            <!-- The list will be generated from FAQ table -->
                            <ul class="list-unstyled">
                                <li><a href="#">Cras justo odio</a></li>
                                <li><a href="#">Cras justo odio</a></li>
                                <li><a href="#">Cras justo odio</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary m-auto" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../../footer.php'; ?>