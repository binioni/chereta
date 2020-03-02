@extends('layouts.master')



@section('content') 

<div class="col-md-9">
<div class="card">
<div class="card-body">
  <div class="card-header p-2">
    <h1>Edit</h1>
  </div>
  <div class="tab-content">
    {!! Form::open(['action' => ['CatagoryController@update', $cat->id], 'method' => 'POST']) !!}

    <div class="formele " style="padding:5px" id="myform"> 
    
      <div class="input-group">
        <div class="custom-file">
          {{Form::text('myname', $cat->name, ['class' => 'form-control', 'placeholder' => 'Insert the catagory'])}}
        </div>
      </div>       
    
    </div>  
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}   
    {!! Form::close() !!}
  </div>
</div>
</div>
</div>
@endsection
