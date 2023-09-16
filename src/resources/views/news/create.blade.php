@extends('layouts.app')

@section('content')
{{ Form::open(['route' => 'news.store','files'=>'true', 'id' => 'form']) }}
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-group margin-bottom20 col-md-6">
                        <label class="control-label" for="title">
                            Title
                        </label>
                        {{ Form::text('title',old('title'),['id'=>'title', 'required','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('title') }}</p>
                    </div>
                    <div class="form-group margin-bottom20 col-md-12">
                        <label class="control-label" for="description">
                            Description
                        </label>
                        {{ Form::textarea('description',old('description'),['id'=>'description','class' => 'form-control']) }}
                        <p class="text-danger" style="margin-bottom: 0;">{{ $errors->first('description') }}</p>
                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="col-md-2 col-xs-4">
                        <button type="submit" class="btn btn-block btn-primary" id="save">
                            Save
                        </button>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <button type="submit" class="btn btn-block btn-primary" id="publish">
                           save_and_publish
                        </button>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <button type="reset" class="btn btn-block btn-primary">
                           Reset
                        </button>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection