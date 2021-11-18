@extends('include.sidenav')

@section('content')
<form action="{{route('postvideos.update',$news->id)}}"  method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Video Title</label>
    <input type="text" name="title" class="form-control" value="{{$videos->title}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Video</label>
    <input type="file" name="image" class="form-control" value="{{$videos->video}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content</label>
    <textarea class="form-control" name="content" id="" cols="30" rows="10">{{$videos->content}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection