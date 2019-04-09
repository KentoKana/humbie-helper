//AJAX
//Save Timer
$('#saveTime').click(function (event) {
    event.preventDefault();

    let timeSaved = $('#timeInMilli').val();
    let studentId = $('#studentId').val();
    let projectId = $('#projectId').val();
    let task = $('#taskName').val();
    // console.log(timeSaved);

    $.post('../../controllers/timer-controller.php',
        {
            time: timeSaved,
            studentId: studentId,
            projectId: projectId,
            taskName: task,
        },
        function (data) {
            // console.log(data);
        }
    )
});
// alert('hello');

//Delete Timer
$('.delTimeRecord').click(function (event) {
    event.preventDefault();
    //https://stackoverflow.com/questions/10944095/ajax-work-only-for-first-row-of-table
    //get value of input via parent <tr> element.
    let timerId = $(this).closest("tr").find('input').val();
    console.log(timerId);
    $.post('../../controllers/timer-controller.php',
        {
            delTimeId: timerId,
        },
        function (data) {
            console.log(data);
        }
    )
    //Remove first <tr> parent after button click.
    $(this).closest('tr').remove();
});
