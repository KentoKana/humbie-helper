<?php include '../../header.php';?>
<main id="jg-main" class="m-4">
  <h1 class="text-center pt-3">Question Title</h1>
  <div class="text-center px-5 py-2">
  <div class="m-2"> Question from database gets inserted here </div>
    <table class="table">
      <tbody>
        <thead class="jg_table__thead">
          <tr>
            <th> Answers </th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr class="jg_table__tbody">
            <td> "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam, quis nostrud exercitation ullamco
              laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
              dolor in reprehenderit in voluptate velit esse cillum dolore eu
              fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est
              laborum." </td>
              <td class="jg_table__align-bottom"> Student Name </td>
              <td class="jg_table__align-bottom"> Mar. 13 2019 </td>
          </tr>
          <tr class="jg_table__tbody">
            <td class="jg_table__column-width"> "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam, quis nostrud exercitation ullamco
              laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
              dolor in reprehenderit in voluptate velit esse cillum dolore eu
              fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est
              laborum." </td>
              <td class="jg_table__align-bottom"> Student name </td>
              <td class="jg_table__align-bottom"> Mar. 13 2019 </td>
          </tr>
        </tbody>
      </tbody>
    </table>
    <form action="" method="post">
      <div class="jg_form__answer-div p-3">
        <label for="answer"> Your Answer: </label>
        <textarea name="answer" rows="5"> Type your answer here... </textarea>
        <button class="jg-form__submit" type="submit" name="addNote">Add my answer!</button>
      </div>
      </form>
  </div>
</main>

<?php include '../../footer.php';?>
