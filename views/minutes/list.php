<?php require_once '../../header.php'; ?>
<div class="container">
  <div class="col-10 mx-auto my-5">
    <button type="button" name="button" class="btn btn-success float-right">Add new minutes</button>
    <h2>Minutes</h2>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Title</th>
          <th scope="col" class="text-md-center">Date Created</th>
          <th scope="col" class="text-md-right">Options</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Minutes of the meeting #1</th>
          <td scope="row" class="text-md-center">01-07-2019, 08:00:55</td>
          <td  scope="row" class="text-md-right"><a href="#" class="btn btn-dark">Edit</a> <a href="#" class="btn btn-primary">Send</a> <a href="#" class="btn btn-danger">Delete</a></td>
        </tr>
        <tr>
          <th scope="row">Minutes of the meeting #2</th>
          <td scope="row" class="text-md-center">01-14-2019 07:55:34</td>
          <td scope="row" class="text-md-right"><a href="#" class="btn btn-dark">Edit</a> <a href="#" class="btn btn-primary">Send</a> <a href="#" class="btn btn-danger">Delete</a></td>
        </tr>
        <tr>
          <th scope="row">Minutes of the meeting #3</th>
          <td scope="row" class="text-md-center">01-21-2019 07:43:00</td>
          <td scope="row" class="text-md-right"><a href="#" class="btn btn-dark">Edit</a> <a href="#" class="btn btn-primary">Send</a> <a href="#" class="btn btn-danger">Delete</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php require_once '../../footer.php'; ?>
