@extends('layouts.master');

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($welcomes->count())
                @foreach($welcomes as $welcome)
                    <div class="col-md-4">
                        <div>
                            <label><h3>{{ $welcome->image_title }}</h3></label>
                        </div>

                            <img class="col-md-12" style="height: 200px; margin-left: -10px;" src="/storage/{{ $welcome->image_location }}" alt="">

                        <div>
                            <label>{{ $welcome->active? 'active':'inactive' }}</label>
                        </div>
                        <div>
                            {{--<form class="form-inline" action="/welcomes/{{ $welcome->id }}" method="post">--}}
                                {{--@csrf--}}
                                {{--<button type="submit" class="btn btn-dark">Edit</button>--}}
                            {{--</form>--}}
                            <a href="/welcomes/{{$welcome->id}}" class="btn btn-dark" role="button">View</a>
                        </div>

                    </div>
                @endforeach
                @else
                    <div class="text-center">
                        <span  style="color: brown;">Currently, There is no image for display in welcome page for users</span>
                    </div>
            @endif
            {{--<div class="col-md-4" >--}}
                {{--<div style="position: center;margin: auto;top: 0;bottom: 0;left: 0;right: 0;">--}}
                {{--<a  href="/welcomes/create" role="button" class="btn btn-primary">ADD NEW</a></div>--}}
            {{--</div>--}}

        </div>
    </div>
@endsection