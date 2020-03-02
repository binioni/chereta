@extends('layouts.master')

@section('content') 
  <h1>Posts</h1>  
  @if(count($data) > 0)  
      @foreach($data as $data)
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Featured</h5>
          </div>
          <div class="card-body">
            <h3>{{$data->title}}</a></h3>
            <small><b>Bid opened in: </b>{{$data->open}}</small><br>
            <small><b>Bid will be closed at: </b>{{$data->close}}</small><br>
            <a class="btn btn-info btn-md" href="/posts/{{$data->id}}/edit">Edit</a>
            
          </div>
        </div>
        
      @endforeach
      
  @else
        <P>no posts available</P>
  @endif

@endsection

            