@extends('layouts.app')
@section('title', 'Add Article')

@section('styles')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
@endsection

@section('content')
<div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading"><h2>Add Article</h2></div>
      <div class="panel-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(array('route' => 'add.article.post','files'=>true, 'class'=> 'form-horizontal')) !!}

            <div class="form-group">
                <label class="control-label col-sm-2" for="title">Title:</label>
                <div class="col-sm-10">
                {!! Form::text('title', null, ['class'=>'form-control', 'id' => 'title']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description:</label>
                <div class="col-sm-10">
                {!! Form::textarea('description', null, ['class'=>'form-control', 'id' => 'description']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="image">Image:</label>
                <div class="col-sm-10">
                    {!! Form::file('image', array('class' => 'form-control', 'id' => 'image')) !!}
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        {!! Form::close() !!}

      </div>
    </div>
</div>

@endsection
