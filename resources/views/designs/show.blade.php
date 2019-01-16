@extends('layouts.app')

@section('content')
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>

    <h1>Showing {{ $design->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $design->name }}</h2>
        <p>
            <strong>Number:</strong> {{ $design->number }}<br>
            <strong>Price:</strong> {{ $design->price }}
        </p>

        <img src="{{ asset($design->image) }}" alt="image">
    </div>

@endsection
