@extends('layouts.master');

@section('content')
    <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" action="/welcomes/{{ $welcome->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            @php
                $required_att = 'required';
            @endphp
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image Title <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input {{ $required_att }} type="text" value="{{ old('image_title')? old('image_title'):$welcome->image_title }}" id="first-name" name="image_title" class="form-control col-md-7 col-xs-12" data-parsley-id="8482"><ul class="parsley-errors-list" id="parsley-id-8482"></ul>
                    @if($errors->has('image_title'))
                        <small style="color: red">{{ $errors->first('image_title') }}</small>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Old Image <span class="required">*</span>
                </label>
                <div >
                    <img class="col-md-6 col-sm-6 col-xs-12" style="height: 250px;" src="/storage/{{ $welcome->image_location }}" alt="">
                </div>

            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Image <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  type="file" name="image_location">
                    @if($errors->has('image_location'))
                        <small style="color: red">{{ $errors->first('image_location') }}</small>
                    @endif
                </div>

            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Text for image <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea {{ $required_att }} name="image_text" class="form-control col-md-7 col-xs-12">{{ old('image_text')? old('image_text'): $welcome->image_text }}</textarea>
                    @if($errors->has('image_text'))
                        <small style="color: red">{{ $errors->first('image_text') }}</small>
                    @endif

                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    <div id="gender" class="btn-group" data-toggle="buttons">

                        <label id="active" class="{{$welcome->active? 'btn btn-default':'btn btn-primary'}}">
                            <input type="radio" name="status" value="inactive"  > &nbsp; Inactive &nbsp;
                        </label><ul class="parsley-errors-list" id="parsley-id-multiple-gender"></ul>
                        <label id="inactive" class="{{$welcome->active? 'btn btn-primary':'btn btn-default'}}">
                            <input type="radio" name="status" value="active" checked> Active
                        </label>
                    </div>
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="/welcomes/{{ $welcome->id }}" role="button" class="btn btn-info">Cancel</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>

        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#active').click(function () {
                $('#active').removeClass("btn-default").addClass('btn-primary');
                $('#inactive').removeClass("btn-primary").addClass("btn-default");
            });

            $('#inactive').click(function () {
                $('#active').removeClass("btn-primary").addClass('btn-default');
                $('#inactive').removeClass("btn-default").addClass("btn-primary");
            });

        });
    </script>
@endsection