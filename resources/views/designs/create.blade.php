@extends('layouts.app')

@section('content')
    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::open(['method' => 'post', 'files' => true, 'url' => '/designs']) }}

        {{ csrf_field() }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('number', 'Number') }}
            {{ Form::text('number', Input::old('number'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('price', 'Price') }}
            {{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('image', 'Image') }}
            <input type="file" class="form-control" name="image" id="image" enctype="multipart/form-data">
        </div>

        {{ Form::submit('Create the design!', array('class' => 'btn btn-primary')) }}
    {!! Form::close() !!}
@endsection