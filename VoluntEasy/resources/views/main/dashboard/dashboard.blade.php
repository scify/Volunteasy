@extends('default')
@section('title')
{{ trans('home.home') }}
@stop
@section('pageTitle')
{{ trans('home.home') }}
@stop

@section('bodyContent')
<div class="row">
    <div class="col-lg-3 col-md-3">
        <div class="panel info-box panel-white">
            <div class="panel-body">
                <div class="info-box-stats">
                    <p class="counter"><a href="{{ url('volunteers/new') }}">{{ $new }}</a></p>
                    <span class="info-box-title">{{ trans('entities/volunteers.new.capitals') }}</span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-leaf"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="panel info-box panel-white">
            <div class="panel-body">
                <div class="info-box-stats">
                    <p class="counter">{{ $available }}</p>
                    <span class="info-box-title">{{ trans('entities/volunteers.available.capitals') }}</span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-leaf"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="panel info-box panel-white">
            <div class="panel-body">
                <div class="info-box-stats">
                    <p class="counter">{{ $active }}</p>
                    <span class="info-box-title">{{ trans('entities/volunteers.active.capitals') }}</span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-leaf"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="panel info-box panel-white">
            <div class="panel-body">
                <div class="info-box-stats">
                    <p class="counter"><a href="{{ url('actions/') }}"> {{ $actions }} </a></p>
                    <span class="info-box-title">{{ trans('entities/actions.new.capitals') }}</span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-bullseye"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    @if($isAdmin)
    <div class="col-md-6">
        <div class="panel panel-info smallHeading mini-panel">
            <div class="panel-heading clearfix ">
                <h4 class="panel-title">{{ trans('entities/volunteers.new') }} {{ trans('entities/volunteers.volunteers') }}</h4>

                <div class="panel-control">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                       class="panel-collapse" data-original-title="Expand/Collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="panel-body">
                @include('main.dashboard._new')
            </div>
        </div>
    </div>
    @endif
    <div class="{{ $isAdmin ? 'col-md-6' : 'col-md-12' }} ">
        <div class="panel panel-warning smallHeading mini-panel">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">{{ trans('entities/volunteers.pending') }} {{ trans('entities/volunteers.volunteers') }}</h4>

                <div class="panel-control">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                       class="panel-collapse" data-original-title="Expand/Collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="panel-body">
                @include('main.dashboard._pending')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-success smallHeading mini-panel">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">{{ trans('entities/volunteers.available') }} {{ trans('entities/volunteers.volunteers') }}</h4>

                <div class="panel-control">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                       class="panel-collapse" data-original-title="Expand/Collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="panel-body">
                @include('main.dashboard._available')
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-primary smallHeading mini-panel">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">{{ trans('entities/volunteers.active') }} {{ trans('entities/volunteers.volunteers') }}</h4>

                <div class="panel-control">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                       class="panel-collapse" data-original-title="Expand/Collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="panel-body">
                @include('main.dashboard._active')
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default smallHeading mini-panel">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">{{ trans('entities/actions.calendar') }}</h4>

                <div class="panel-control">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                       class="panel-collapse" data-original-title="Expand/Collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="panel-body">
                @include('main.dashboard._calendar')
            </div>
        </div>
    </div>

    @if( $new + $pending + $available + $active + $blacklisted > 0)
    <div class="col-md-6">
        <div class="panel panel-default smallHeading mini-panel">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">{{ trans('entities/volunteers.reports.status-pie') }}</h4>

                <div class="panel-control">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                       class="panel-collapse" data-original-title="Expand/Collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="panel-body">
                @include('main.dashboard._donut')
            </div>
        </div>
    </div>
    @endif


    <div class="col-md-6">
        <div class="panel info-box panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">{{ trans('entities/volunteers.birthdayToday') }}</h4>
                <div class="panel-control">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                       class="panel-collapse" data-original-title="Expand/Collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="info-box-stats">
                    <span>
                        @if(sizeof($birthday)==0)
                        <span>{{ trans('entities/volunteers.noBirthday') }}</span>
                        @else
                        @foreach($birthday as $i => $volunteer)
                            @if($i==0)
                            <a href="{{ url('volunteers/one/'.$volunteer->id) }}">{{ $volunteer->name }} {{
                                $volunteer->last_name }}</a> ({{ $volunteer->age  }})
                            @else
                            , <a href="{{ url('volunteers/one/'.$volunteer->id) }}">{{ $volunteer->name }} {{
                            $volunteer->last_name }}</a>  ({{ $volunteer->age  }})
                            @endif
                        @endforeach
                        @endif
                    </span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-birthday-cake"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
