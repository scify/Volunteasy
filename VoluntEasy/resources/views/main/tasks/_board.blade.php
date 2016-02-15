<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">

                @if(sizeof($action->tasks)>0)
                <div class="row bottom-margin statuses">
                    <div class="col-md-4">
                        <h3 class="panel-title">To Do</h3>
                    </div>
                    <div class="col-md-4">
                        <h3 class="panel-title">Doing</h3>
                    </div>
                    <div class="col-md-4">
                        <h3 class="panel-title">Done</h3>
                    </div>
                </div>

                <div class="row board">
                    <div class="col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">

                                @foreach($action->tasks as $task)

                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse-{{ $task->id }}"
                                           aria-expanded="false" aria-controls="collapse-{{ $task->id }}"
                                           class="arrow collapsed">
                                        </a>

                                        <a href="#" class="title" onclick="editTask({{ $task->id }})">{{ $task->name }}</a>

                                        @if(sizeof($task->todoSubtasks) > 0  && sizeof($task->doingSubtasks)==0 && sizeof($task->doneSubtasks)==0)
                                            <span class="status todo">TO DO</span>
                                        @elseif(sizeof($task->doneSubtasks) > 0  && sizeof($task->doingSubtasks)==0 && sizeof($task->todoSubtasks)==0)
                                             <span class="status done">DONE</span>
                                        @elseif(sizeof($task->doingSubtasks) > 0)
                                            <span class="status doing">DOING</span>
                                        @endif

                                        <small> {{ sizeof($task->subtasks) }} subtasks</small>
                                    </h4>
                                </div>
                                <div id="collapse-{{ $task->id }}" class="panel-collapse collapse"
                                     role="tabpanel"
                                     aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">

                                        <div class="row task-{{ $task->id }} board-row">

                                            <div class="col-md-4 board-column todo">
                                                @foreach($task->todoSubtasks as $subtask)
                                                <div class="board-card priority-{{ $subtask->priority }}"
                                                     data-task="{{ $task->id }}"
                                                     data-subtask="{{ $subtask->id }}" data-status="todo">
                                                    <p><a href="#" onclick="editSubTask({{ $subtask->id }})">{{$subtask->name}}</a>
                                                        <span class="pull-right text-danger"><small>31-jan
                                                            </small></span></p>
                                                    <small class="text-left">2/12 εθελοντές</small>
                                                </div>
                                                @endforeach
                                            </div>

                                            <div class="col-md-4 board-column doing">
                                                @foreach($task->doingSubtasks as $subtask)
                                                <div class="board-card priority-{{ $subtask->priority }}"
                                                     data-task="{{ $task->id }}"
                                                     data-subtask="{{ $subtask->id }}" data-status="todo">
                                                    <p><a href="#" onclick="editSubTask({{ $subtask->id }})">{{$subtask->name}}</a>
                                                        <span class="pull-right text-danger"><small>31-jan
                                                            </small></span></p>
                                                    <small class="text-left">2/12 εθελοντές</small>
                                                </div>
                                                @endforeach
                                            </div>

                                            <div class="col-md-4 board-column done">
                                                @foreach($task->doneSubtasks as $subtask)
                                                <div class="board-card priority-{{ $subtask->priority }}"
                                                     data-task="{{ $task->id }}"
                                                     data-subtask="{{ $subtask->id }}" data-status="todo">
                                                    <p><a href="#" onclick="editSubTask({{ $subtask->id }})">{{$subtask->name}}</a>
                                                        <span class="pull-right text-danger"><small>31-jan
                                                            </small></span></p>
                                                    <small class="text-left">2/12 εθελοντές</small>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div class="row top-margin">
                                            <div class="col-md-12 subtask">
                                                <a href="#" data-toggle="modal" data-target="#addSubTask"
                                                   data-task-id="{{$task->id}}" class="addSubTask"><i
                                                        class="fa fa-plus"></i> Προσθήκη subtask</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                @else
                <p>Δεν υπάρχει κανένα task για τη δράση.</p>
                @endif
                <div class="row top-margin">
                    <div class="col-md-12">
                        <a href="#" data-toggle="modal" data-target="#addTask"><i
                                class="fa fa-plus"></i> Προσθήκη task</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('main.tasks.modals._add_task')
@include('main.tasks.modals._edit_task')
@include('main.tasks.modals._add_subtask')
@include('main.tasks.modals._edit_subtask')


@section('footerScripts')
<script src="{{ asset('assets/js/pages/task_board.js')}}"></script>
@append
