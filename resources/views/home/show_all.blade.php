@extends('layouts.master');
@section('content')
    <ul>
    @foreach($temp as $info)
       <li><a role="button" href="/infos/{{ $info->id }}"> {{$info->name}} </a></li>
    @endforeach
    </ul>
@endsection