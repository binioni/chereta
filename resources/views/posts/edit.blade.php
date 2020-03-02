@extends('layouts.master')



@section('content') 

<div class="col-md-9">
  <div class="card">
  <div class="card-body">
    <div class="card-header p-2">
      <h1>Edit Post</h1>
    </div>
 
   
  {!! Form::open(['action' => ['PostsController@update', $data->id], 'method' => 'POST']) !!}

  <div class="formele card card-primary" style="padding:5px" id="myform">
    
    
    <div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('mytitle', $data->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>  
  
    <div class="form-group">
      {{Form::label('contact', 'Phone-adress')}}
      {{Form::number('mycontact', $data->contact, ['class' => 'form-control', 'placeholder' => 'Phone-number'])}}
    </div>

    <div class="form-group">
      {{Form::label('requirment', 'Requirment')}}
      {{Form::text('myrequirment', $data->requirment, ['class' => 'form-control', 'placeholder' => 'Requirment'])}}
    </div>

    <div class="form-group">
      {{Form::label('city', 'City')}}
      {{Form::text('mycity', $data->city, ['class' => 'form-control', 'placeholder' => 'City'])}}
    </div>

    <div class="form-group">
      {{Form::label('discription', 'Description')}}
      {{Form::textarea('mydiscription', $data->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>

    <div class="form-group">
      {{Form::label('catagory', 'Catatories')}}
      <select class="form-control m-bot15" name="mycatagories">
        @if ($cat->count())
    
            @foreach($cat as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>  
            @endforeach  
    
        @endif    
    </select>
    </div>

    <div class="form-group">
      {{Form::label('company', 'Companies')}}
      <select class="form-control m-bot15" name="mycompanies">
        @if ($comp->count())
    
            @foreach($comp as $comp)
                <option value="{{ $comp->id }}">{{ $comp->name }}</option>  
            @endforeach  
    
        @endif    
    </select>
    </div>

    <div class="form-group">
      {{Form::label('open', 'Bid Opening Date: ')}}
      {{Form::date('myopen', \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
      {{Form::label('close', 'Bid Closing Date: ')}}
      {{Form::date('myclose', \Carbon\Carbon::now())}}
    </div>

   {{Form::hidden('_method','PUT')}}
  {{Form::submit('Submit', ['class'=>'btn btn-primary' ])}}   
  {!! Form::close() !!}
        
    
    
</div>
  </div>
  </div>
</div>



@endsection




