@extends('layouts.master')
@section('content')
    <h1>List of Admins</h1>
    <ul>
        @foreach($admins as $admin)
            <li>{{ $admin->name }}</li>
        @endforeach
    </ul>
@endsection
