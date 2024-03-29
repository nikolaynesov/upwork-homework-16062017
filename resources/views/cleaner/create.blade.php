@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Cleaner</h1>
    <hr/>

    {!! Form::open(['url' => '/cleaner', 'class' => 'form-horizontal', 'files' => true]) !!}

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

            <div class="form-group {{ $errors->has('quality_score') ? 'has-error' : ''}}">
                {!! Form::label('quality_score', 'Quality Score', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('quality_score', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('quality_score', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('available_from') ? 'has-error' : ''}}">
                {!! Form::label('available_from', 'Available From', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::time('available_from', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('available_from', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('available_to') ? 'has-error' : ''}}">
                {!! Form::label('available_to', 'Available To', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::time('available_to', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('available_to', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('cities') ? 'has-error' : ''}}">
                {!! Form::label('cities', 'Cities', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">

                    @foreach($cities as $city)

                        <div>

                            {!! Form::checkbox(
                                'cities[]',
                                $city->id,
                                null,
                                ['id'=>'city-'.$city->id, 'autocomplete'=>'false'])
                                !!}
                            {!! Form::label('city-'.$city->id, $city->name, ['class' => 'control-label']) !!}

                        </div>

                    @endforeach


                    {!! $errors->first('cities', '<p class="help-block">:message</p>') !!}
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