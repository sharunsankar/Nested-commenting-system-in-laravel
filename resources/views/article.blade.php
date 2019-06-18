@extends('layouts.app')
@section('title', 'Article')

@section('styles')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p><b>{{$article['title']}}</b></p>
                    <p>
                        {{$article['description']}}
                    </p>
                    <div class="fakeimg" ><img src="{{ asset('images/'.$article->image_name) }}" width="160"></div>
                    <hr />
                    <h4> Comments</h4>
  
                    @include('include.showComments', ['comments' => $article->comments, 'article_id' => $article->id])
   
                    <hr />
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
                    
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comment.add') }}">
                      {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="text" class="form-control" />
                            <input type="hidden" name="article_id" value="{{$article['id']}}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
