@extends('layouts.master')

@section('content')

<div class="row mt-2">

  <div class="col-md-9 offset-md-2" >
    <div class="card mb-3" style="min-width : 18rem;">


        <div class="card-body">
          <div class="card-title">
            <h1>{{$post->title}}</h1>
          </div>

          <img src="{{asset('storage/coverImages/'.$post->image)}}" alt="" height="300" width="300">

          <div class="card-text">
              <h4>{{$post->body}}</h4>
          </div>
          <hr>
          <small class="text-muted"><p>created by : {{$post->user->name}}</p></small>
          <small class="text-muted"><p> {{$post->created_at}}   </p></small>
          @auth

            @if(auth()->user()->id == $post->user_id)
                <a href="{{'/posts/' . $post->id . '/edit'}}" class="btn btn-primary float-left mr-2"> Edit </a>  <!--when click on this button will go to function show (because the routing) -->
                <!--<a href="#" class="btn btn-danger"> Delete </a>-->
                <form class="" action="{{route('posts.destroy',['id'=> $post->id])}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger floar-left">Delete</button>
          </form>
            @endif
          @endauth

        </div>
    </div>
  </div>

</div>

@endsection
