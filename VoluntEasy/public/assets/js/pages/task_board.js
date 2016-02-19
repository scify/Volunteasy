/* General js scripts about the task board*/

//global variables to keep the task and subtask
var task;
var subTask;


$(".board-card").draggable({
    containment: ".task-" + $(this).attr('data-task') + ".board-row ",
    connectToSortable: ".board-column"
});

$(".board-column").sortable({
    placeholder: "ui-state-highlight",
    stop: function (event, ui) {
        var status;

        //when the task is moved, the status changes
        if ($(this).hasClass('todo'))
            status = 'To Do';
        else if ($(this).hasClass('doing'))
            status = 'Doing';
        else
            status = 'Done';

        //change the status while remaining at the same page
        $.ajax({
            url: $("body").attr('data-url') + "/actions/tasks/subtasks/updateStatus",
            method: 'GET',
            data: {
                "action_id": $("#actionId").attr("data-action-id"),
                "task_id": $(ui.item).attr("data-task"),
                "subTaskId": $(ui.item).attr("data-subtask"),
                "status": status
            },
            success: function (result) {
            }
        });
    }
});

//set the task id in the modal
$(".addSubTask").click(function () {
    $(".modal-body #taskId").val($(this).attr('data-task-id'));
    $("#subtask-priorities option[value='2']").prop('selected', true);
})


//save a task
$("#storeTask").click(function (e) {
    e.preventDefault();
    if ($("#name").val() == null || $("#name").val() == '')
        $("#name_err").show();
    else {
        $("#name_err").hide();

        $.ajax({
            url: $("body").attr('data-url') + "/actions/tasks/store",
            method: 'POST',
            data: $("#createTask").serialize(),
            success: function (result) {
                location.reload();
            }
        });
    }
});


//save a subtask
$("#storeSubTask").click(function (e) {
    e.preventDefault();
    if ($("#subtask-name").val() == null || $("#subtask-name").val() == '')
        $("#subtask-name_err").show();
    else {
        $("#subtask-name_err").hide();

        $.ajax({
            url: $("body").attr('data-url') + "/actions/tasks/subtasks/store",
            method: 'POST',
            data: $("#createSubTask").serialize(),
            success: function (result) {
                console.log(result);
                //location.reload();
            }
        });
    }
});

//update a subtask
$("#updateSubTask").click(function (e) {
    e.preventDefault();
    if ($("#editSubTask #subtask-name").val() == null || $("#editSubTask #subtask-name").val() == '')
        $("#editSubTask #subtask-name_err").show();
    else {
        $("#editSubTask #subtask-name_err").hide();

        $.ajax({
            url: $("body").attr('data-url') + "/actions/tasks/subtasks/update",
            method: 'POST',
            data: $("#editSubTaskForm").serialize(),
            success: function (result) {
                location.reload();
            }
        });
    }
});

//populate the edit task modal with data before displaying it
$(".editTask").click(function (e) {


    $("#editTask #taskId").val($(this).attr('data-task-id'));
    $("#editTask #due_date").datepicker("update", $(".taskInfo .due_date").text());
    $("#editTask #name").val($(".taskInfo .name").text());
    $("#editTask #description").val($(".taskInfo .description").text());
    $("#editTask #priorities option[value='" + $(".taskInfo .priority").attr('data-priority') + "']").prop('selected', true);

    //show modal
    $('#editTask').modal('show');
});

//populate the edit subtask modal with data before displaying it
function editSubTask(subTaskId) {

    //fetch the subtask data to show in the modal
    $.ajax({
        method: 'GET',
        url: $("body").attr('data-url') + "/actions/tasks/subtasks/one/" + subTaskId,
        success: function (result) {
            console.log(result);
            $("#editSubTask #taskId").val(result.task_id);
            $("#editSubTask #subTaskId").val(result.id);
            $("#editSubTask #subtask-name").val(result.name);
            $("#editSubTask #subtask-description").val(result.description);
            $("#editSubTask #subtask-due_date").datepicker("update", result.due_date);
            $("#subtask-priorities option[value='" + result.priority + "']").prop('selected', true);

            volunteers = [];
            $.each(result.volunteers, function (index, value) {
                volunteers.push(value.id);
            });

            $("#editSubTask #subtaskVolunteers").val(volunteers).trigger("change");
        }
    });

    //show modal
    $('#editSubTask').modal('show');
}

//delete a task
$(".deleteTask").click(function () {
    if (confirm("Είστε σίγουροι ότι θέλετε να διαγράψετε το task;") == true) {

        $.ajax({
            method: 'GET',
            url: $("body").attr('data-url') + "/actions/tasks/delete/" + $(this).attr('data-task-id'),
            success: function (result) {
                location.reload();
            }
        });
    }
});

//delete a subtask
$("#deleteSubTask").click(function () {
    if (confirm("Είστε σίγουροι ότι θέλετε να διαγράψετε το subtask;") == true) {

        $.ajax({
            method: 'GET',
            url: $("body").attr('data-url') + "/actions/tasks/subtasks/delete/" + $("#subTaskId").val(),
            success: function (result) {
                location.reload();
            }
        });
    }
});


//add another editable fields to fill in work date and hours
function addWorkDate() {


    var lastTr = $("#workDates tr:last");

    if ($(lastTr).find('.workDate input').val() == null || $(lastTr).find('.workDate input').val() == '' ||
        $(lastTr).find('.workHourFrom input').val() == null || $(lastTr).find('.workHourFrom input').val() == '' ||
        $(lastTr).find('.workHourTo input').val() == null || $(lastTr).find('.workHourTo input').val() == '') {
        $(".workError").show();
    }
    else {
        $(".workError").hide();
        $("#workDates tr:last").clone().find("input").each(function () {
            $(this).val('');
        }).end().appendTo("#workDates");


        $(".date").datepicker({
            language: 'el',
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $(".time").timepicker({
            lang: {
                'am': ' π.μ.',
                'pm': ' μ.μ.'
            }
        });
    }
}

function showTaskInfo(taskId) {
    //fetch the task data to show in the sidebar
    $.ajax({
        method: 'GET',
        url: $("body").attr('data-url') + "/actions/tasks/one/" + taskId,
        success: function (result) {
            $(".taskInfo .due_date").text(result.due_date == null ? '-' : result.due_date);
            $(".taskInfo .name").text(result.name);
            $(".taskInfo .description").text(result.description);

            $(".taskInfo .editTask").attr('data-task-id', result.id);
            $(".taskInfo .deleteTask").attr('data-task-id', result.id);


            /*   var status = '-';
             console.log(result);
             if (result.todoSubtasks != null && result.todoSubtasks.length() > 0 &&
             (result.doingSubtasks == null || result.doingSubtasks.length() == 0) &&
             (result.doneSubtasks == null || result.doneSubtasks.length() == 0))

             status = '<span class="status todo">TO DO</span>';

             else if (result.doneSubtasks != null && result.doneSubtasks.length() > 0 &&
             (result.doingSubtasks == null || result.doingSubtasks.length() == 0) &&
             (result.todoSubtasks == null || result.todoSubtasks.length() == 0))

             status = '<span class="status done">DONE</span>';

             else if (result.doingSubtasks != null && result.doingSubtasks.length() > 0)
             status = '<span class="status doing">DOING</span>';

             $(".taskInfo .tstatus").html(status);
             */

            if (result.priority == 1)
                $(".taskInfo .priority").text('Χαμηλή');
            if (result.priority == 2)
                $(".taskInfo .priority").text('Μεσαία');
            if (result.priority == 3)
                $(".taskInfo .priority").text('Υψηλή');
            if (result.priority == 4)
                $(".taskInfo .priority").text('Επείγον');

            $(".taskInfo .priority").attr('data-priority', result.priority);

            $(".taskInfo").show();
        }
    });
}


$('.date').datepicker({
    language: 'el',
    format: 'dd/mm/yyyy',
    autoclose: true
});

$('.time').timepicker({
    lang: {
        'am': ' π.μ.',
        'pm': ' μ.μ.'
    }
});

$(".multiple").select2();


