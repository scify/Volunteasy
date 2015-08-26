@extends('default')

@section('title')
Επεξεργασία Εθελοντή/Εθελόντριας
@stop
@section('pageTitle')
Επεξεργασία Εθελοντή/Εθελόντριας
@stop

@section('bodyContent')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"
                                class="{{ $errors->has('name') || $errors->has('last_name') || $errors->has('fathers_name') ||$errors->has('birth_date') ? 'tab has-error' : ''}}"><i
                                class="fa fa-user m-r-xs"></i>Ατομικά
                            Στοιχεία</a></li>
                        <li role="presentation"><a href="#tab2" data-toggle="tab" class="{{ $errors->has('email') ? 'tab has-error' : ''}}"><i
                                class="fa fa-phone m-r-xs"></i>Στοιχεία
                            Επικοινωνίας</a></li>
                        <li role="presentation"><a href="#tab3" data-toggle="tab"><i class="fa fa-university m-r-xs"></i>Εκπαίδευση &
                            Ικανότητες</a></li>
                        <li role="presentation"><a href="#tab4" data-toggle="tab"
                                                   class="{{ $errors->has('participation_reason') ? 'tab has-error' : ''}}"><i
                                class="fa fa-cog m-r-xs"></i>Εργασιακή Εμπειρία &
                            Εθελοντική Προσφορά</a></li>
                        <li role="presentation"><a href="#tab5" data-toggle="tab"><i class="fa fa-clock-o m-r-xs"></i>Διαθεσιμότητα &
                            περιοχές ενδιαφερόντων</a>
                        </li>
                        <li role="presentation"><a href="#tab6" data-toggle="tab" class="{{ $errors->has('files[]') ? 'tab has-error' : ''}}"><i class="fa fa-file-text-o m-r-xs"></i>Σχόλια & Αρχεία</a>
                        </li>
                    </ul>
                    {!! Form::model($volunteer, ['id' => 'wizardForm', 'method' => 'POST', 'action' => ['VolunteerController@update', 'id' => $volunteer->id], 'files'=>true]) !!}
                        @include('main.volunteers.partials._form', ['submitButtonText' => 'Αποθήκευση', 'volunteer' => $volunteer])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
