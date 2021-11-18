@extends('include.sidenav')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <!-- <source src="mov_bbb.mp4" type="video/mp4"> -->
    <div class="container">
            <div class="row">
            @foreach($news as $news)
                 <div class="col-md-4">
                     <div class="row">
                           <div class="col-md-11 bg-white" style="border:1px solid black">
                           <br>
                             <h5>{{$news->title}}</h5>
                             <hr>
                             <video width="100%" height="200" controls>
                                <source src="{{URL::asset('storage/videos/' . $news->video)}}" type="video/mp4">
                            </video><br>
                             <p>{{$news->content}}</p>
                             <a href="{{route('postnews.edit',$news->id)}}" class="btn btn-info btn-sm d-inline">Update</a>
                             <form action="{{route('postnews.destroy',$news->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                             </form><br><br>
                           </div>
                     </div>
                 </div>
            @endforeach
@endsection