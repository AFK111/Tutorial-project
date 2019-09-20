@extends('layouts.master')

@section('content')
<h1>{{$title}}</h1>
<ul class="list-group">
  @if(count($services)>0)   <!-- to check if the array services is empty or not -->
  @foreach($services as $service)
    <li class="list-group-item">{{$service}}</li>
    @endforeach
  @endif
</ul>


@endsection
