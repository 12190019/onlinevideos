@extends('include.sidenav')

@section('content')

   @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
      <div class="container">
            <div class="row">
            @foreach($events as $event)
                 <div class="col-md-4">
                     <div class="row">
                           <div class="col-md-11 bg-white" style="border:1px solid black">
                           <br>
                             <h5>{{$event->title}}</h5><br>
                             <img src="{{asset('storage/images/' . $event->image)}}" width="100%" height="200px" alt=""><br><br>
                             <p>{{$event->content}}</p>
                             <br>
                             <a href="{{route('postevent.edit',$event->id)}}" class="btn btn-info btn-sm d-inline">Update</a>
                             <form action="{{route('postevent.destroy',$event->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                             </form><br><br>
                           </div>
                     </div>
                 </div>
            @endforeach
            </div>
      </div>
@endsection