@extends('layouts.master')

@section('content') 
    <div class="jumbotron">
        <h2>{{$data->title}}</h2>
        <h4>{{$data->description}}</h4>
        <h4>{{$data->contact}}</h4>
        <h4>{{$data->requirment}}</h4>
        <h4>{{$data->description}}</h4>
        <h4>{{$data->city}}</h4>

    </div>
@endsection