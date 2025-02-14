@extends('default')

@section('title')
{{ trans('entities/collaborations.create') }}
@stop

@section('pageTitle')
{{ trans('entities/collaborations.create') }}
@stop

@section('bodyContent')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">{{ trans('entities/collaborations.info') }}</h4>

                <div class="panel-control">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                       class="panel-collapse" data-original-title="Expand/Collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::model($collaboration, ['method' => 'POST', 'action' => ['CollaborationController@update', 'id' => $collaboration->id], 'files'=>true]) !!}
                        @include('main.collaborations.partials._form', ['submitButtonText' => trans('default.save'), 'collaboration' =>$collaboration])
                        {!! Form::close() !!}
                        {!! Form::hidden('collaboration_id', $collaboration->id, ['id' => 'collaboration_id']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

