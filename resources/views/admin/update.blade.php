@extends('include.sidenav')

@section('content')
<form action="{{route('postevent.update',$event->id)}}"  method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Event Title</label>
    <input type="text" name="title" class="form-control" value="{{$event->title}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" name="image" class="form-control" value="{{$event->image}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content</label>
    <textarea class="form-control" name="content" id="" cols="30" rows="10">{{$event->content}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection