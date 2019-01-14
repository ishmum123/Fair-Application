@extends('layouts.master');

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading"><h1 class="text-center">Front Page Image Details</h1></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label for="">Image Title</label>
                    </div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-4">{{ $welcome->image_title }}</div>
                    <div class="col-md-2"></div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label for="">Image Text</label>
                    </div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-4">{{ $welcome->image_text }}</div>
                    <div class="col-md-2"></div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label for="">Status</label>
                    </div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-4"><span style="color: {{ $welcome->active? 'green':'red' }}">{{ $welcome->active? 'Active': 'Inactive' }}</span></div>
                    <div class="col-md-2"></div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2"></div>
                    <img class="col-md-8" src="/uploads/{{ $welcome->image_location }}" alt="">
                    <div class="col-md-2"></div>

                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 ">
                <a href="/welcomes/{{$welcome->id}}/edit" role="button" class="pull-right btn btn-info">Edit</a>
            <form class="pull-right" action="/welcomes/{{ $welcome->id }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete</button>
            </form>
            </div>
            <div class="col-md-2"></div>
            </div>
        </div>
    </div>
@endsection