<?php
require_once '../../header.php';
require_once '../../models/Database.php';

$dbContext = Database::getDatabase();
$query = "SELECT a.id, agenda_title, agenda_date FROM agendas a LEFT JOIN projects_students p ON a.project_id = p.project_id WHERE p.student_id = :student_id";
$stmt = $dbContext->prepare($query);
$studID = 8;
$stmt->bindParam(":student_id", $studID);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container">
  <div class="col-10 mx-auto my-5">
    <button type="button" name="button" class="btn btn-success float-right">Add new agenda</button>
    <h2>Agendas</h2>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Title</th>
          <th scope="col" class="text-md-center">Date Created</th>
          <th scope="col" class="text-md-right">Options</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if($result)
        {
          foreach($result as $key => $val)
          {
            echo "<tr>";
            echo sprintf('<td scope="row">%s</td>', $val->agenda_title );
            echo sprintf('<td scope="row" class="text-md-center">%s</td>', $val->agenda_date );
            echo sprintf('<td  scope="row" class="text-md-right"><a href="#%d" class="btn btn-dark">Edit</a> <a href="#" class="btn btn-primary">Send</a> <a href="#" class="btn btn-danger">Delete</a></td>', $val->id );
            echo "</tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<?php require_once '../../footer.php'; ?>
