@extends('layouts.master')

@section('content')
<h2>List of all Posts</h2>
<hr>
<div class="row"> <!--row means 1 row in bootstrap -->

  <div class="col-md-10">

    <div class="row">
      <div class="row">
        @foreach($posts as $post)

            <div class="col-md-4">
                 <div class="card mb-3" style="max-width : 18rem; max-height: 18rem;" >



                    <div class="card-header bg-dark text-white">
                        {{$post->title}}

                    </div>

                    <div class="card-body">
                      <div class="card-title">
                        <!-- <h4>{{$post->title}}</h4> -->
                        <img src="{{asset('storage/coverImages/'.$post->image)}}" alt="" height="50" width="50">
                      </div>


                      <div class="card-text" >
                              <h6>
                                <?php
                                  if(strlen($post->body)<100)
                                    echo $post->body;
                                    else
                                      echo substr($post->body,0,100);
                                   ?>
                              </h6>
                      </div>

                      <hr>

                      <a href="{{'/posts/' . $post->id}}" class="btn btn-primary"> Show More </a>  <!--when click on this button will go to function show (because the routing) -->

                    </div>
                </div>
            </div>

        @endforeach
      </div>

    </div>

  </div>


  <div class="col-md-2">

    <div class="card mb-3" style="max-width: 18rem;">

        <div class="card-header bg-info text-white">Stats.</div>

        <div class="card-body">
            <p class="card-text"> All Posts: {{$count}}</p>
        </div>
    </div>

  </div>

</div>


<div class="row">
  <div class="col-md-12 d-flex justify-content-center">
    {{$posts->links()}}
  </div>
</div>
@endsection
