@extends('layout.main')

@section('content')
    <div>
        @auth
        <h1>Dashboard, {{ auth()->user()->name }}</h1>
        @else
        <h1>Dashboard</h1>
        @endauth
    </div>
@endsection