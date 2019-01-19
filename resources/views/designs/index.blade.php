@extends('layouts.app')

@section('content')
    <div class="action-bar">
        <a class="pull-right btn btn-success" href="{{ url('designs/create') }}">+ Create a design</a>
    </div>
    <h1>All the designs</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        @foreach($designs as $key => $design)
        <div class="col-md-3">
            <div class="panel panel-info">
                <a href="{{ URL::to('designs/' . $design->id) }}">
                    <div class="panel-body">
                        <img src="{{ Storage::disk('s3')->url($design->image) }}" alt="">
                    </div>
                    <div class="panel-footer">
                        <b>{{ $design->name }}</b>
                        <p>Folder: {{ $design->number }} <b class="pull-right">${{ number_format($design->price, 2, ',', '.') }}</b></p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>

@endsection
