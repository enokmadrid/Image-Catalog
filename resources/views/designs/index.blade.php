@extends('layouts.app')

@section('content')

    <h1>All the designs</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Image</td>
            <td>Name</td>
            <td>Folder #</td>
            <td>Price</td>

        </tr>
        </thead>
        <tbody>
        @foreach($designs as $key => $value)
            <tr>
                <td><img src="{{ asset($value->image) }}" alt=""></td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->number }}</td>
                <td>{{ $value->price }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the design (uses the destroy method DESTROY /designs/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the design (uses the show method found at GET /designs/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('designs/' . $value->id) }}">Show this design</a>

                    <!-- edit this design (uses the edit method found at GET /designs/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('designs/' . $value->id . '/edit') }}">Edit this design</a>

                    <!-- Delete this design -->
                    {!! Form::open(['method' => 'DELETE','route' => ['designs.destroy', $value->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
