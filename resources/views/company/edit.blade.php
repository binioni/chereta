@extends('layouts.master')



@section('content') 

<div class="col-md-9">
  <div class="card">
  <div class="card-body">
    <div class="card-header p-2">
      <h1>Edit company</h1>
    </div>
 
   
  {!! Form::open(['action' => ['CompanyController@update', $cat->id], 'method' => 'POST']) !!}

  <div class="formele card card-primary" style="padding:5px" id="myform">
    
    
    <div class="form-group">
    {{Form::label('name', 'Company Name')}}
    {{Form::text('myname', $cat->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>  
  
    <div class="form-group">
      {{Form::label('contact', 'Phone-adress')}}
      {{Form::number('mycontact', $cat->phone, ['class' => 'form-control', 'placeholder' => 'Phone-number'])}}
    </div>

    <div class="form-group">
      {{Form::label('discription', 'Description')}}
      {{Form::text('mydiscription', $cat->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>

    <div class="form-group">
      {{Form::label('city', 'City')}}
    <select class="form-control m-bot15" name="mycity">
        @if ($city->count())
    
            @foreach($city as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>  
            @endforeach  
    
        @endif    
    </select>
    </div>

    <div class="form-group">
      {{Form::label('website', 'Website')}}
      {{Form::text('myweb', $cat->website, ['class' => 'form-control', 'placeholder' => 'Website'])}}
    </div>

    <div class="form-group">
      {{Form::label('facebook', 'Facebook')}}
      {{Form::text('myface', $cat->facebook, ['class' => 'form-control', 'placeholder' => 'Facebook'])}}
    </div>

   {{Form::hidden('_method','PUT')}}
  {{Form::submit('Submit', ['class'=>'btn btn-primary' ])}}   
  {!! Form::close() !!}
        
    
    
</div>
  </div>
  </div>
</div>



@endsection




