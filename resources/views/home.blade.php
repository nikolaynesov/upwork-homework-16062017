@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Create New Booking</h1>
        <hr/>

        {!! Form::open(['url' => '/', 'class' => 'form-horizontal', 'files' => true]) !!}

        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
            {!! Form::label('first_name', 'First Name', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
            {!! Form::label('last_name', 'Last Name', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
            {!! Form::label('phone_number', 'Phone Number', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
            {!! Form::label('date', 'Date', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::date('date', null, ['class' => 'form-control']) !!}
                {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
            {!! Form::label('time', 'Time', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::time('time', null, ['class' => 'form-control']) !!}
                {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
            {!! Form::label('duration', 'Duration (hours)', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::number('duration', null, ['class' => 'form-control']) !!}
                {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
            {!! Form::label('city', 'City', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">

                @foreach($cities as $city)

                    <div>

                        {!! Form::radio(
                            'city',
                            $city->id,
                            null,
                            ['id'=>'city-'.$city->id, 'autocomplete'=>'false'])
                            !!}
                        {!! Form::label('city-'.$city->id, $city->name, ['class' => 'control-label']) !!}

                    </div>

                @endforeach


                {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </div>
@endsection
