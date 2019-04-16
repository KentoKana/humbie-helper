<?php require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/note-controller.php';

$_SESSION['project_id'];

$note_id = $_SESSION['note_id'];
$note= $n->getNote($note_id, $db);


?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3"><?=$note->notes_title?></h1>
  <!--View individual notes-->
  <div class="m-5 p-3">
    <?=$note->notes_content?>
  </div>
  <div class="p-2">
    <button class="jg-button-primary text-center"><a href="<?=RVIEWS . '/notes/list-notes.php'?>">View All Notes </a></button>
  </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
