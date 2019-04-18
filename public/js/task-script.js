function initDrag(){
  $('#addTaskCard').on('show.bs.modal', function (event) {
      var type = "";
      var button = $(event.relatedTarget) // Button that triggered the modal
      var title = button.data('title') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text(title);
      modal.find('.btn-add').text(title);
      // add the current index
      modal.find('#tcIndex').val(button.val());
      // add type
      switch(title)
      {
        case "Add Card":
          type = "card";
        break;
        case "Add Task":
          type = "task";
        break;
      }
      modal.find('#addType').val(type);
  });

  // add a card or task
  $('.btn-add').click(function(){
    var title = $('#tcTitle').val();
    var desc = $('#tcDescription').val();
    var index = $('#tcIndex').val();
    var pid = $('#projId').val();
    var type = $('#addType').val();

    var params = {
      'tcName' : title,
      'tcDesc' : desc,
      'tcIndex' : index,
      'projectId': pid,
      'tcId' : 1
    };


    switch (type) {
      case "card":
      $.post("../../controllers/taskcards-controller.php?method=addCard", { params : params } , function(data){
        if(data)
        {
          // append to task list
          $('#taskListNested1').append(data);

          // add 1 to the task counter
          var incrementBtnVal = $('#newCard');
          incrementBtnVal.val(parseInt(incrementBtnVal.val()) + 1);
          // clear values
          $('#tcTitle').val("");
          $('#tcDescription').val("");
        }
      });
      break;
      case "task":
      $.post("../../controllers/taskcards-controller.php?method=addTask", { params : params } , function(data){
        if(data)
        {
          // append to task list
          $('.tasklist').append(data);

          // add 1 to the task counter
          var incrementBtnVal = $('#newTaskList');
          incrementBtnVal.val(parseInt(incrementBtnVal.val()) + 1);

          // clear values
          $('#tcTitle').val("");
          $('#tcDescription').val("");
        }
      });
      break;
    }

    //close the modal manually
    $('#addTaskCard').modal('hide')
  });
    // uncomment to enable task sorting
    // const wrapper = document.querySelectorAll(".tasklist");
    // // const todo = document.querySelectorAll(".task");
    // for(const wrap of wrapper) {
    //     new Sortable(wrap, {
    //       group: "sorting",
    //       sort: true
    //     });
    // }

    const tasks = document.querySelectorAll('.tasklist__nested');
    for(let task of tasks)
    {
        new Sortable(task, {
          group: "nested",
          sort: true,
          animation: 150,
          filter: ".filtered",
          fallbackOnBody: true,
          swapThreshold: 0.65,
          onEnd: function(e) {
              var siblingCount = parseInt(e.item.parentElement.childElementCount);
              var siblings = e.item.parentElement.childNodes;
              var taskIndex = e.item.parentElement.attributes[2].value;
              var sorted = {
                  sort: {
                    cardIndex: [],
                    taskCardId: [],
                    taskIndex: [],
                  }
              };
              for(let ctr = 0; ctr < siblingCount; ctr++)
              {
                  siblings[ctr].attributes[2].value = ctr + 1;
                  sorted.sort.taskIndex.push(taskIndex);
                  sorted.sort.taskCardId.push(siblings[ctr].attributes[1].value)
                  sorted.sort.cardIndex.push(siblings[ctr].attributes[2].value)
              }
              console.log(sorted);

              $.post('../../controllers/taskcards-controller.php?method=sort', {params: sorted}, function(data){
                $('.sandbox').html(data);
              });
          }
        });
    }
}
window.onload = initDrag;
