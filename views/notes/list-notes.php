<?php require './../../config.php';
require_once CONTROLLERS.'/note-controller.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

//$_SESSION['studentId'];
$_SESSION['project_id'];
$project_id = $_SESSION['project_id'];
require_once VIEWS . '/header.php';
?>
<main id="jg-main" class="m-4">
  <!--Here is a table to display all notes associated with a project -->
  <h1 class="text-center pt-3">All Notes</h1>
    <div class="text-center px-5 py-2">
      <table class="table">
        <tbody>
          <thead class="jg_table__thead">
            <tr>
              <th> Title </th>
              <th> Date Created </th>
              <th> View </th>
              <th> Edit </th>
              <th> Delete </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($notes as $note):?>
            <tr class="jg_table__tbody">
              <td> <?=$note->notes_title?></td>
              <td> <?=$note->notes_date?> </td>
              <td>
                <form action="" method="POST">
                  <input type='hidden' name='note_id' value='<?=$note->id?>'/>
                  <input class='jg-table__button' type='submit' name='view' value='View Note' />
                </form>
              </td>
              <td>
                <form action="" method="POST">
                  <input type='hidden' name='note_id'value='<?=$note->id?>'/>
                  <input class='jg-table__button' type='submit' name='edit' value='Edit Note' />
                </form>
              </td>
              <td>
                <form action="" method="POST">
                  <input type='hidden' name='note_id' value='<?=$note->id?>'/>
                  <input type='submit' class='jg-table__button' name='delete' value='Delete Note'/>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </tbody>
      </table>
      <button class="btn jg-button-primary"><a href="<?=RVIEWS . '/notes/add-note.php'?>">Add New Note </a></button>
    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
