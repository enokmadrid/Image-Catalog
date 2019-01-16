@extends('layouts.app')

@section('content')

  <h1>Edit {{ $design->name }}</h1>
  <!-- if there are creation errors, they will show here -->
  {{ Html::ul($errors->all()) }}

  {{ Form::model($design, ['method' => 'PATCH', 'files' => true, 'action' => ['DesignController@update',$design->id]]) }}


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

      {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}
  {!! Form::close() !!}
  {{--</form>--}}
@endsection
