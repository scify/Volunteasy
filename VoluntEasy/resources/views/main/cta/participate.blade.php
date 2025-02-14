<!DOCTYPE html>
<?php $lang = "/default."; ?> {{--  resource label path --}}
<html>
<head>
    <!-- Title -->
    <title>{{ trans('entities/cta.cta') }} | {{trans($lang.'title')}}</title>

    @include('template.default.headerIncludes')
</head>
<body class="page-login cta" data-url="{!! URL::to('/') !!}">
<main class="page-content" style="background-color:#F1F4F9;">
    <div class="page-inner">
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-8 center">
                    <div class="panel panel-white">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('assets/images/cta_logo.png') }}"/>
                                </div>
                            </div>
                            @if(isset($publicAction) && $publicAction!=null)
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>{{ trans('entities/cta.callVolunteersToAction') }} <strong>{{ $action->description }}</strong></h2>

                                    <p><i class="fa fa-calendar"></i> <strong>{{ $action->start_date }}</strong> {{ trans('default.to') }}
                                        <strong>{{ $action->end_date }}</strong>
                                        @if($publicAction->address!=null && $publicAction->address!='')
                                        @if($publicAction->map_url!=null && $publicAction->map_url!='')
                                        <i class="fa fa-map-marker" style="margin-left:10px;"></i> <a
                                            href="{{ $publicAction->map_url }}"
                                            target="_blank">{{ $publicAction->address}}</a></p>
                                    @else
                                    <i class="fa fa-map-marker" style="margin-left:10px;"></i> {{ $publicAction->address }}</p>
                                    @endif
                                    @endif

                                    <p>{{ $publicAction->description }}</p>

                                    @if($publicAction->executive_name!=null && $publicAction->executive_name!='')
                                    <p>{{ trans('entities/cta.exec') }}: {{ $publicAction->executive_name }}
                                        @if($publicAction->executive_phone!=null && $publicAction->executive_phone!='')
                                        , {{ $publicAction->executive_phone }}
                                        @endif
                                        @if($publicAction->executive_email!=null && $publicAction->executive_email!='')
                                        , <a href="mailto:{{ $publicAction->executive_email }}">{{
                                            $publicAction->executive_email }}</a>
                                        @endif
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    {{-- <img src="{{ asset('assets/images/volunteer_hands.png') }}"
                                              style="width:100%;"/> --}}
                                </div>
                            </div>

                            {!! Form::open(['id' => 'volunteerInterested', 'method' => 'POST', 'action' =>
                            ['CTAController@volunteerInterested']]) !!}
                            <input type="hidden" name="publicActionId" value="{{$publicAction->id}}">

                            @foreach($tasks as $task)
                            <table class="table tasks">
                                <tr>
                                    <td colspan="2">
                                        <div class="task-info">
                                            <h3>{{ $task->name }}</h3>

                                            <p>{{ $task->description }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @foreach($task->ctaSubtasks as $subtask)
                                @if(sizeof($subtask->shifts)>0)
                                <tr>
                                    <td class="task col-md-3">
                                        <div class="subtask-info">{{ $subtask->name }}</div>
                                        <div class="subtask-description">{{ $subtask->description }}</div>
                                    </td>
                                    <td class="taskDate">
                                        @foreach($subtask->shifts as $shift)
                                        <div class="dateTime">
                                            <label {{ sizeof($shift->volunteers)>=$shift->volunteer_sum ? 'class=disabled' : ''}} >
                                                @if(sizeof($shift->volunteers)>=$shift->volunteer_sum)
                                                {!! Form::formInput('dates['.$shift->id.']', '', $errors, ['type' => 'checkbox', 'checked' =>'false',
                                                'disabled' => 'disabled', 'readonly']) !!}
                                                @else
                                                {!! Form::formInput('dates['.$shift->id.']', '', $errors, ['type' => 'checkbox', 'checked' =>'false'])
                                                !!}
                                                @endif
                                                <div class="dates"> {{$shift->from_date}} <br/>  <span
                                                        class="hours">{{ $shift->from_hour }}-{{ $shift->to_hour }}
                                                    </span>
                                                    @if(sizeof($shift->volunteers)==$shift->volunteer_sum)
                                                    <br/><span class="text-success">{{ sizeof($shift->volunteers) }}/{{ $shift->volunteer_sum }}
                                                   {{ trans('entities/cta.volunteers') }}</span>
                                                    @else
                                                    <br/>{{ sizeof($shift->volunteers) }}/{{ $shift->volunteer_sum }}
                                                    {{ trans('entities/cta.volunteers') }}
                                                    @endif
                                                </div>
                                            </label>
                                        </div>
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                            @endforeach

                            @if($errors->has('dates'))
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-danger">{{ trans('entities/cta.pleaseSelectPosition') }}</p>
                                </div>
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{ trans('entities/cta.weWillContactYou') }}</h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::formInput('first_name', trans('entities/cta.firstName') .':', $errors, ['class' => 'form-control',
                                        'id' =>
                                        'first_name', 'required' => 'true']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::formInput('last_name', trans('entities/cta.lastName') .':', $errors, ['class' =>
                                        'form-control', 'id' =>
                                        'last_name', 'required' => 'true']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::formInput('email', trans('entities/cta.email') .':', $errors, ['class' => 'form-control',
                                        'required' => 'true']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::formInput('phone_number', trans('entities/cta.phone') .':', $errors, ['class'
                                        => 'form-control',
                                        'required' => 'true']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::formInput('comments', trans('entities/cta.comments') .':', $errors, ['class' => 'form-control',
                                        'type' => 'textarea', 'size' =>'2x2']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    {!! Form::submit(trans('entities/cta.iAmInterested'), ['class' => 'btn btn-success width-140']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{ trans('entities/cta.pageNotFound') }}</h3>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
        </div>
        <!-- Main Wrapper -->
    </div>
    <!-- Page Inner -->

</main>
<!-- Page Content -->
<script src="{{ asset('assets/plugins/jquery/jquery-2.1.3.min.js')}}"></script>
<script>
    $('.checkbox').uniform();
</script>
</body>
</html>
