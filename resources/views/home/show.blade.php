@extends('layouts.master')
@section('content')
<div>
    <h1>{{$temp->name}}</h1>
    <div><img src="{{$temp->pic_name}}" alt=""></div>
</div>
@endsection