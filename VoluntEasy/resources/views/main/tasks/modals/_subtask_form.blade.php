<input type="hidden" name="taskId" class="taskId" value="">
<input type="hidden" name="actionId" class="actionId" value="{{$action->id}}">
<input type="hidden" name="subTaskId" class="subTaskId" value="">

<div class="row">
    <div class="col-md-2">
        {!! Form::formInput('subtask-name', 'Όνομα sub-task:', $errors, ['class' => 'form-control name', 'required' =>
        'true']) !!}

        <p class="text-danger subtask-name_err" style="display:none;">Συμπληρώστε το πεδίο.</p>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Λήγει στις:</label>
            {!! Form::formInput('subtask-due_date', '', $errors, ['id' => 'subtask-due_date', 'class' => 'form-control
            date due_date', 'data-date-start-date' => $action->start_date, 'data-date-end-date' => $action->end_date])
            !!}

        </div>
    </div>
    <div class="col-md-2">
        <label>Προτεραιότητα:</label>
        <select class="form-control m-b-sm subtask-priorities" name="subtask-priorities">
            <option value="4">{{ trans($lang.'priority-urgent')}}</option>
            <option value="3">{{ trans($lang.'priority-high')}}</option>
            <option value="2" selected>{{ trans($lang.'priority-medium')}}</option>
            <option value="1">{{ trans($lang.'priority-low')}}</option>
        </select>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::formInput('subtask-description', 'Περιγραφή sub-task:', $errors,
            ['class' => 'form-control description', 'type' => 'textarea', 'size' => '2x3']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h4><i class="fa fa-calendar"></i> Χρονοδιάγραμμα εργασιών εθελοντών</h4>


        <table class="table table-condensed table-bordered table-striped table-striped workDates">
            <thead>
            <th>Ημέρα</th>
            <th>Ώρα από</th>
            <th>Ώρα εώς</th>
            <th># εθελοντών</th>
            <th>Εθελοντές</th>
            <th>Σχόλια</th>
            </thead>
            <tbody>
            <tr>
                <td class="workDate col-md-1">
                    <input type="hidden" name="workDates[ids][]" class="dateId" value="">
                    {!! Form::formInput('workDates[dates][]', '', $errors, ['class' =>
                    'form-control date datetime',
                    'data-date-start-date' => $action->start_date, 'data-date-end-date' => $action->end_date,
                    'data-date-format' => 'dd/mm/yyyy']) !!}
                </td>
                <td class="workHourFrom col-md-1">{!! Form::formInput('workDates[hourFrom][]', '', $errors, ['class' =>
                    'form-control
                    time datetime']) !!}
                </td>
                <td class="workHourTo col-md-1">{!! Form::formInput('workDates[hourTo][]', '', $errors, ['class' =>
                    'form-control
                    time datetime']) !!}
                </td>
                <td class="comments col-md-1">{!! Form::formInput('workDates[volunteerSum][]', '', $errors, ['class' =>
                    'form-control']) !!}
                </td>
                <td class="volunteers col-md-3">
                    <select class="js-states form-control multiple" multiple="multiple"
                            name="workDates[subtaskVolunteers][]"
                            tabindex="-1"
                            style="display: none; width: 100%">
                        @foreach($allVolunteers as $volunteer)
                        <option value="{{ $volunteer->id }}">{{ $volunteer->name}} {{$volunteer->last_name}}</option>
                        @endforeach
                    </select>
                </td>
                <td class="comments col-md-3">{!! Form::formInput('workDates[comments][]', '', $errors, ['type' =>
                    'textarea', 'size' => '1x1', 'class' => 'form-control']) !!}
                </td>
            </tr>
            </tbody>
        </table>
        <p class="workError text-danger" style="display:none;">Συμπληρώστε όλα τα πεδία</p>

        <div class="col-md-12">
            <p><a href="#" onclick="addWorkDate('{{ $parentId }}')" class="add-dates"><i class="fa fa-plus-circle"></i>
                    Προσθήκη διαθεσιμότητας</a></p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <h4><i class="fa fa-check-square-o"></i> To-do</h4>

        <form action="javascript:void(0);">
            <input type="text" class="form-control add-task" placeholder="New Task...">
        </form>


        <div class="todo-list">
            <div class="todo-item complete">
                <div class="checker"><span class="checked"><input type="checkbox"></span></div>
                <span>Go Shopping</span>
                <a href="javascript:void(0);" class="pull-right remove-todo-item"><i class="fa fa-times"></i></a>
            </div>
            <div class="todo-item complete">
                <div class="checker"><span class="checked"><input type="checkbox"></span></div>
                <span>Create new Wordpress Theme</span>
                <a href="javascript:void(0);" class="pull-right remove-todo-item"><i class="fa fa-times"></i></a>
            </div>
            <div class="todo-item complete">
                <div class="checker"><span class="checked"><input type="checkbox" checked=""></span></div>
                <span>Change slider style</span>
                <a href="javascript:void(0);" class="pull-right remove-todo-item"><i class="fa fa-times"></i></a>
            </div>
            <div class="todo-item complete">
                <div class="checker"><span class="checked"><input type="checkbox" checked=""></span></div>
                <span>Fronted Theme</span>
                <a href="javascript:void(0);" class="pull-right remove-todo-item"><i class="fa fa-times"></i></a>
            </div>
            <div class="todo-item">
                <div class="checker"><span class=""><input type="checkbox"></span></div>
                <span>Learn C# programming language</span>
                <a href="javascript:void(0);" class="pull-right remove-todo-item"><i class="fa fa-times"></i></a>
            </div><div class="todo-item added"><div class="checker"><span><input type="checkbox"></span></div><span class="todo-description">test</span><a href="javascript:void(0);" class="pull-right remove-todo-item"><i class="fa fa-times"></i></a></div>
        </div>


    </div>
</div>
