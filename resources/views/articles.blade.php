@extends('layouts.app')
@section('title', 'Articles')

@section('styles')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
@endsection

@section('content')

<div class="container">
  <h2>Articles</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Description</th>
        <th>Image</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    @if($articles)
    @foreach($articles as $article)
      <tr>
        <td>{{$article->title}}</td>
        <td>{{$article->user->name}}</td>
        <td>{{$article->description}}</td>
        <td><img src="{{ asset('images/'.$article->image_name) }}" width="60"></td>
        <td><a href="article/{{$article->id}}">View article </a></td>
      </tr>
      @endforeach
    @endif      
    </tbody>
  </table>
</div>

</body>
</html>


@endsection
