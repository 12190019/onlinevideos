@extends('include.sidenav')

@section('content')
<form action="{{route('postvideos.store')}}"  method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">video Title</label>
    <input type="text" name="title" class="form-control" placeholder="video Title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Video</label>
    <input type="file" name="video" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content</label>
    <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection