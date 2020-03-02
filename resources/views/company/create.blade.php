@extends('layouts.master')



@section('content') 
<script>
  const regex = /myform/gi;   //this will find the form 'myform' id in the div
  const regex2 = /qqq/gi;     //this will find the form 'qqq' id in the div
  const regex22 = /myname/gi;
  const regex3 = /mycontact/gi;
  const regex5 = /mycity/gi;
  const regex6 = /mydiscription/gi;
  const regex7 = /myface/gi;
  const regex8 = /myweb/gi;
  var id=1;                   //an id that is going to be apended in myform to distinict each form  that are hidden when they are displayed
  function delete_form(id)    // a function that will remove a form when the 'X' is clicked
  {
    $("#myform"+id).remove();
    $("#form_num").val($("#form_num").val()-1);
    if($('.formele').length < 2)
    {
      $("#submitbtn").attr('hidden', true);
    }
  }
  $(document).ready(function(){
  
    $("#btn2").click(function(){
      $("#form_num").val((Number($("#form_num").val())+1)+'');
     
      var num = $("#form_num").val();
      var temp = $("#temp").html();
      $("#append").append(
                 temp.replace(regex, "myform"+id).
                 replace(regex2, id).
                 replace(regex22, "myname_"+num).
                 replace(regex3, "mycontact_"+num).
                 replace(regex5, "mycity_"+num).
                 replace(regex6, "mydiscription_"+num).
                 replace(regex7, "myface_"+num).
                 replace(regex8, "myweb_"+num)
                 );  //regex will  find 'myform' replces it by adding apends the id on it  and the second one will refex will replace the qqq and changes it to its id to delete it

      id++;
      $("#submitbtn").attr('hidden', false);
      
    });
    
  });
  </script>




<!-- /.col -->
<div class="col-md-9">
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#edit_post" data-toggle="tab">Edit Companies</a></li>
        <li class="nav-item"><a class="nav-link" href="#add_post" data-toggle="tab">Add Companies</a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane" id="add_post">

          <h1>Create post</h1>
   
          {!! Form::open(['action' => 'CompanyController@store', 'method' => 'POST']) !!}
          {{Form::number('num', '', ['value'=>0,'id'=>'form_num','class' => 'form-control',"hidden"=>true])}}
          <div id="append"></div>   <!-- div that contains all and the hiddden form -->
          {{Form::submit('Add company', ['class'=>'btn btn-primary', 'id'=>'submitbtn','style'=>'width: 100%' ,'hidden'=>true])}}   
          {!! Form::close() !!}
        
          <div id="temp" hidden>    <!-- div that contains the hiddden form will be added to the above form when the add button is clicked -->
          <div class="formele card card-primary" style="padding:5px" id="myform">
            <div class="card-header">
              <h3 class="card-title">Add company</h3>
              <a onclick="delete_form('qqq')" style="float:right" class="btn btn-danger">X</a> <!-- it will delete the form by sending 'qqq' as id and the regex will change it to the actual id -->
          
            </div>
            
            
            <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('myname', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>  
          
            <div class="form-group">
              {{Form::label('contact', 'Phone-adress')}}
              {{Form::number('mycontact', '', ['class' => 'form-control', 'placeholder' => 'Phone-number'])}}
            </div>
        
            <div class="form-group">
              {{Form::label('discription', 'Description')}}
              {{Form::textarea('mydiscription', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>     
            
        
            <div class="form-group">
              {{Form::label('city', 'City')}}
              <select class="form-control m-bot15" name="mycity">
                @if ($cat->count())
            
                    @foreach($cat as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>  
                    @endforeach  
            
                @endif    
            </select>
            </div>

            <div class="form-group">
              {{Form::label('website', 'Website')}}
              {{Form::text('myweb', '', ['class' => 'form-control', 'placeholder' => 'Website'])}}
            </div>
                
            <div class="form-group">
              {{Form::label('facebook', 'Facebook')}}
              {{Form::text('myface', '', ['class' => 'form-control', 'placeholder' => 'Facebook'])}}
            </div>
            
        </div>
        </div>  
        
        
        <a id="btn2" class="btn btn-primary" style="margin-top: 50px; margin-bottom: 50px">ADD more forms</a> 

</div>

<div class="active tab-pane" id="edit_post">
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    #
                </th>
                <th style="width: 35%">
                    Companies
                </th>
                <th style="width: 5%">
                  Contact
                </th>
                <th style="width: 5%">  
                  Website
                </th>
                <th style="width: 30%"> 
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comp as $comp)      
                <tr>
                    <td>
                        {{$comp->id}}
                    </td>
                    <td>
                      {{$comp->name}}
                    </td>
                    <td>
                        {{$comp->phone}}
                    </td>
                    <td>
                      {{$comp->website}}
                    </td>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="/company/{{$comp->id}}/edit">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                        
                      <!--  delete should not be used in catagories table because it is a foreign key 
                         {!! Form::open(['action' => ['CompanyController@destroy', $comp->id], 'method' => 'POST','class'=>'pull-right']) !!}        
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}   
                        {!! Form::close() !!} -->
                        
                    </td>
                </tr>
            @endforeach               
                
        </tbody>
    </table>
</div>
</div>
<!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div><!-- /.card-body -->
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->


@endsection
