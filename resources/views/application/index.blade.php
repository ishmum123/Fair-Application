@extends('layouts.master')
@section('content')

    @if(auth()->user()->role == 'super_admin')

        @include('application.super_admin_view');
        @else
            @include('application.user_admin_view');
    @endif
@endsection
