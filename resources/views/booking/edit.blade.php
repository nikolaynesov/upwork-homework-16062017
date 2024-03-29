@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Booking {{ $booking->id }}</h1>

    {!! Form::model($booking, [
        'method' => 'PATCH',
        'url' => ['/booking', $booking->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

                    <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                {!! Form::label('date', 'Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('customer_id') ? 'has-error' : ''}}">
                {!! Form::label('customer_id', 'Customer Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('customer_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cleaner_id') ? 'has-error' : ''}}">
                {!! Form::label('cleaner_id', 'Cleaner Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('cleaner_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cleaner_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('start_at') ? 'has-error' : ''}}">
                {!! Form::label('start_at', 'Start At', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::time('start_at', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('start_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('end_at') ? 'has-error' : ''}}">
                {!! Form::label('end_at', 'End At', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::time('end_at', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('end_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>



        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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