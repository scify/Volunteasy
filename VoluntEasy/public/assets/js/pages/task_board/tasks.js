//set the task id in the modal
$(".addSubTask").click(function () {
    $(".modal-body .taskId").val($(this).attr('data-task-id'));
    $('#addSubTask .todos').hide();
    $("#subtask-priorities option[value='2']").prop('selected', true);
})


//save a task
$("#storeTask").click(function (e) {
    e.preventDefault();
    if ($("#addTask .name").val() == null || $("#addTask .name").val() == '')
        $("#addTask .name_err").show();
    else {
        $("#addTask .name_err").hide();

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

//update a task
$("#updateTask").click(function (e) {
    e.preventDefault();
    if ($("#editTask .name").val() == null || $("#editTask .name").val() == '')
        $("#editTask .name_err").show();
    else {
        $("#editTask .name_err").hide();

        $.ajax({
            url: $("body").attr('data-url') + "/actions/tasks/update",
            method: 'GET',
            data: $("#editTaskForm").serialize(),
            success: function (result) {
                location.reload();
            }
        });
    }
});


//populate the edit task modal with data before displaying it
$(".editTask").click(function (e) {

    $.when(getTask($(this).attr('data-task-id')))
        .then(function () {
            $("#editTask .taskId").val(task.id);
            $("#editTask .due_date").datepicker("update", task.due_date);
            $("#editTask .name").val(task.name);
            $("#editTask .description").val(task.description);
            $("#editTask .priorities option[value='" + task.priority + "']").prop('selected', true);

            if (task.users.length > 0) {
                //$('#editTask input:radio[name="assignTo"][value="user"]').prop('checked', true);
                $('#editTask input:radio[name=assignTo]').val('user');
            }
            else if (task.volunteers.length > 0) {
                $('#editTask input:radio[name=assignTo]').filter('[value=volunteer]').prop('checked', true);
            }

            //show modal
            $('#editTask').modal('show');
        });
});


//delete a task
$(".deleteTask").click(function () {
    if (confirm(Lang.get('js-components.deleteTask')) == true) {

        $.ajax({
            method: 'GET',
            url: $("body").attr('data-url') + "/actions/tasks/delete/" + $(this).attr('data-task-id'),
            success: function (result) {
                location.reload();
            }
        });
    }
});

//set the userSelect disabled or not depending on checkbox value
$('.assignTo').click(function () {
    var mode = 'store';
    if ($(this).hasClass('edit'))
        mode = 'edit';

    if ($(this).val() == 'user') {
        $('.taskUserSelect.' + mode).removeAttr('disabled');
        $('.taskVolunteerSelect.' + mode).attr('disabled', 'disabled');
    }
    else if ($(this).val() == 'volunteer') {
        $('.taskVolunteerSelect.' + mode).removeAttr('disabled');
        $('.taskUserSelect.' + mode).attr('disabled', 'disabled');
    }
});


/* show the task info at the side div */
function showTaskInfo(taskId) {
    //fetch the task data to show in the sidebar
    $.when(getTask(taskId))
        .then(function () {

            $(".taskInfo .due_date").text(task.due_date == null ? '-' : task.due_date);
            $(".taskInfo .name").text(task.name);
            $(".taskInfo .description").text(task.description == null || task.description == '' ? '-' : task.description);

            $(".taskInfo .editTask").attr('data-task-id', task.id);
            $(".taskInfo .deleteTask").attr('data-task-id', task.id);

            if (task.priority == 1)
                $(".taskInfo .priority").text(Lang.get('js-components.low'));
            if (task.priority == 2)
                $(".taskInfo .priority").text(Lang.get('js-components.medium'));
            if (task.priority == 3)
                $(".taskInfo .priority").text(Lang.get('js-components.high'));
            if (task.priority == 4)
                $(".taskInfo .priority").text(Lang.get('js-components.urgent'));

            $(".taskInfo .priority").attr('data-priority', task.priority);

            $(".subTaskInfo").hide();
            $(".taskInfo").show();

        });
}


//get a task by its id
function getTask(id) {
    return $.ajax({
        method: 'GET',
        url: $("body").attr('data-url') + "/actions/tasks/one/" + id,
        success: function (result) {
            task = result;
        }
    });
}
