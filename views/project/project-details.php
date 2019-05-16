<?php
require './../../config.php';
require_once CONTROLLERS.'/project-controller.php';
require_once CONTROLLERS.'/deadline-controller.php';
require_once CONTROLLERS.'/timer-controller.php';
require_once CONTROLLERS.'/faq-controller.php';
require_once CONTROLLERS.'/quote-controller.php';
require_once CONTROLLERS.'/announcement-controller.php';
require_once CONTROLLERS.'/taskcards-controller.php';

//require_once CONTROLLERS.'/student-controller.php';
$project_id = $_SESSION['project_id'];
$single_project = $project->singleProject($project_id, $db);
$students = $project->listStudentsInProject($project_id, $db);
$categories = $ca->get_categories($db);
require_once VIEWS . '/header.php';
?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <?php echo $randQuote->quote . " - " . $randQuote->quote_author; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

    <!-- Dismissable Motivational Quote -->


    <h1 class="text-center m-3 jg_project_title"><?=$single_project->project_name?></h1>
    <main id="jg-main" class="m-4">
    <div class="container jg-project-details_container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center jg_sub-header">
                <div>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-project-tab" data-toggle="pill" href="#pills-project"
                                role="tab" aria-controls="pills-project" aria-selected="true">Task List</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-announcements-tab" data-toggle="pill"
                                href="#pills-announcements" role="tab" aria-controls="pills-announcements"
                                aria-selected="false">Announcements</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="pills-students-tab" data-toggle="pill" href="#pills-students"
                                role="tab" aria-controls="pills-students" aria-selected="false">Students</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="pills-deadlines-tab" data-toggle="pill" href="#pills-deadlines"
                                role="tab" aria-controls="pills-deadlines" aria-selected="false">Deadlines</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-tools-tab" data-toggle="pill" href="#pills-tools" role="tab"
                                aria-controls="pills-tools" aria-selected="false">Tools</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-projectDetails-tab" data-toggle="pill"
                                href="#pills-projectDetails" role="tab" aria-controls="pills-projectDetails"
                                aria-selected="false">Project Details</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="tab-content m-2" id="pills-tabContent">

                    <!-- Project Tab  -->
                    <div class="tab-pane fade show active" id="pills-project" role="tabpanel" aria-labelledby="pills-project-tab">
                      <div class="sandbox">

                      </div>
                        <?php
                          $params = [
                            'projectId' => $projectId,
                            'db' => $db
                          ];
                          displayTasks($params);
                        ?>
                    </div>
                    <!-- Announcements Tab  -->
                    <div class="tab-pane fade" id="pills-announcements" role="tabpanel"
                        aria-labelledby="pills-announcements-tab">
                        <ul class="list-group list-group-flush text-center col-md-6 mx-auto">
                            <li class="list-group-item jg-add-details">
                                <a href="../announcements/add-announcement.php"> + Add New Announcement </a>
                            </li>
                        </ul>
                        <?php foreach ($myAnnounce as $announcement) { ?>
                        <div class="card mt-2 col-md-6 mx-auto" >
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $announcement->announcement_title; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $announcement->announcement_time; ?></h6>
                                <p class="card-text"><?php echo $announcement->announcement ?></p>
                                <a href="../announcements/edit-announcement.php?id=<?php echo $announcement->id;?>" class="jg-add-details btn">Edit</a>
                                <a href="../announcements/delete-announcement.php?id=<?php echo $announcement->id;?>" class="jg-add-details btn">Delete</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- Deadlines tab -->
                    <div class="tab-pane fade" id="pills-deadlines" role="tabpanel"
                        aria-labelledby="pills-deadlines-tab">
                      <ul class="list-group list-group-flush text-center col-md-6 mx-auto">
                        <li class="list-group-item jg-add-details">
                            <a href="../deadline/add-deadline.php"> + Add New Deadline </a>
                        </li>
                      </ul>
                          <?php
                                    $deadlines = $d->listDeadlines($project_id);
                                    foreach($deadlines as $deadline):
                                    ?>
                            <div class="card mt-2 mx-auto col-md-6" >

                                <div class="card-body text-center">
                                    <h5 class="card-title"> <?= $deadline['event_name'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <?= date('Y-m-d', strtotime($deadline['event_date'])); ?></h6>
                                    <p class="card-text"><?= $deadline['event_description'] ?></p>
                                    <form id="jg-deadline_form" action="" method="POST">
                                      <a href="../deadline/edit-deadline.php?id=<?=$deadline['id']?>" class="jg-add-details btn">Edit</a>
                                        <input type="hidden" name="deadlineId" value="<?=$deadline['id']?>">
                                        <button name="delDeadline" class="jg-add-details btn" type="submit">Delete</button>

                                    </form>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                    <!-- Tools Tab -->
                    <div class="tab-pane fade" id="pills-tools" role="tabpanel" aria-labelledby="pills-tools-tab">
                      <div class="d-flex flex-row mobile">
                        <div class="card text-center m-2 p-1 col-md-6 m-2 p-4">
                          <h5 class="card-title">More Tools</h5>
                          <table class="table table-striped">
                              <tbody>
                              <tr>
                                  <td><a href="<?=RVIEWS . '/agenda/list.php'?>">Agenda Tool</a></td>
                              </tr>
                              <tr>
                                  <td><a href="<?=RVIEWS . '/files/list-files.php'?>">Share Files</a></td>
                              </tr>
                              <tr>
                                  <td><a href="<?=RVIEWS . '/notes/list-notes.php'?>">Notes Tool</a></td>
                              </tr>
                              <tr>
                                  <td><a href="<?=RVIEWS . '/minutes/list.php'?>">Minutes Tool</a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="card text-center m-2 col-md-6 m-2 p-4">
                            <div>
                                <div class="timer-col-wrap">
                                  <h5 class="card-title">Time Tracker</h5>
                                    <form action="" method="POST">
                                        <div>
                                            <input type="text" name="taskName" id="taskName">
                                            <div id="validateTask"></div>
                                            <?php if(isset($_POST[''])) {echo Student::validateData($student->setFName($_POST['fname']), "Invalid First Name." );} ?>
                                        </div>
                                        <h2 id="timer">00 : 00 : 00</h2>
                                        <div class="timer-buttons">
                                            <button type="button" class="button__button jg-add-details btn" id="toggle">Start</button>
                                            <button type="button" class="button__button jg-add-details btn" id="reset">Reset</button>
                                        </div>

                                        <input type="hidden" name="time" id="timeInMilli">
                                        <input type="hidden" name="studentId" id="studentId"
                                            value="<?=$_SESSION['studentId'];?>">
                                        <input type="hidden" name="projectId" id="projectId"
                                            value="<?=$_SESSION['project_id'];?>">
                                        <button class="jg-add-details btn" type="submit" id="saveTime">Add to Timesheet</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                  </div>

                    <!-- Project Details -->
                    <div class="tab-pane fade" id="pills-projectDetails" role="tabpanel"
                        aria-labelledby="pills-projectDetails-tab">
                        <div class="d-flex flex-row mobile">
                            <div class="card text-center col-md-6 m-2 p-4">
                                <h5 class="card-title">Project Description</h5>
                                <p class="card-text"><?=$single_project->project_description?></p>
                                <div class="jg-card-footer">
                                  <a href="edit-project.php" class="jg-add-details btn">Edit</a>
                                  <a href="delete-project.php" class="jg-add-details btn">Delete</a>
                                </div>
                            </div>
                            <div class="card text-center col-md-6 m-2 p-4">
                                <h5 class="card-title">Students In This Project</h5>
                                <table class="table table-striped">
                                  <tbody>
                                    <?php
                                foreach($students as $student):?>
                                <tr>
                                    <td> <?=$student->student_fname . ' ' . $student->student_lname?>
                                    </td>
                                  </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>
                                <a class="jg-add-details p-3" href="project-student-list.php"> + Add Students to Project</a></li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




      <!-- Task Modal -->
        <div class="modal fade" id="addTaskCard" tabindex="-1" role="dialog" aria-labelledby="addTaskCardLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addTaskCardLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="tcTitle" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" id="tcTitle">
                  </div>
                  <div class="form-group">
                    <label for="tcDescription" class="col-form-label">Description:</label>
                    <textarea class="form-control" id="tcDescription"></textarea>
                    <input type="hidden" name="tcIndex" id="tcIndex" value="">
                    <input type="hidden" name="taskId" id="taskId" value="">
                    <input type="hidden" name="projId" id="projId" value="<?=$project_id;?>">
                    <input type="hidden" name="addType" id="addType" value="">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn jg-button-primary btn-add">Add Card</button>
              </div>
            </div>
          </div>
        </div>

    <!-- Button trigger modal -->
    <div id="jg-humbie-button-block">
        <img id="humbie-button-img" src="<?=IMG?>/images/Humbie.png" alt="Humbie the hippo">
    <button id="jg-humbie-button" type="button" class="jg-button-primary" data-toggle="modal" data-target="#exampleModal">
       Need help?
    </button>
  </div>


    <!-- Humbie Modal -->

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <button id="close" type="button"
          class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <div class="modal-body">
          <div class="jg-hippo-sprite p-3 mb-3">
            <div id="jg-hippo-sprite__image"></div>
            <p id="jg-hippo-sprite__text"> Hi! I'm Humbie, how can I help you? </p>
          </div>
          <div class="row">
            <div class="col-3">
              <h2 class="jg_modal__title"> Categories </h2>
              <ul class="jg_faq__ul">
                <?php foreach($categories as $category):?>
                  <li id="<?=$category->id?>"> <?=$category->category_name?> </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="col-9">
              <ul class="faqs">
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
