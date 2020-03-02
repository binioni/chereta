@extends('layouts.master')



@section('content') 
<script>
  const regex = /myform/gi;   //this will find the form 'myform' id in the div
  const regex2 = /qqq/gi;     //this will find the form 'qqq' id in the div
  const regex22 = /myname/gi;
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
                 replace(regex22, "myname_"+num)
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
        <li class="nav-item"><a class="nav-link active" href="#edit_post" data-toggle="tab">Edit Catagories</a></li>
        <li class="nav-item"><a class="nav-link" href="#add_post" data-toggle="tab">Add Catagories</a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane" id="add_post">

        <h1>Create chereta catagories</h1>
        
        {!! Form::open(['action' => 'CatagoryController@store', 'method' => 'POST']) !!}
        {{Form::number('num', '', ['value'=>0,'id'=>'form_num','class' => 'form-control',"hidden"=>true])}}
        <div id="append"></div>   <!-- div that contains all and the hiddden form -->
        {{Form::submit('Submit', ['class'=>'btn btn-primary', 'id'=>'submitbtn','style'=>'width: 100%' ,'hidden'=>true])}}   
        {!! Form::close() !!}

        <div id="temp" hidden>    <!-- div that contains the hiddden form will be added to the above form when the add button is clicked -->
        <div class="formele " style="padding:5px" id="myform"> 
          
            <div class="input-group">
              <div class="custom-file">
                {{Form::text('myname', '', ['class' => 'form-control', 'placeholder' => 'Insert the catagory'])}}
              </div>
              <div class="input-group-append">
                <a onclick="delete_form('qqq')" style="float:right" class="btn btn-danger" class="input-group-text">cancel</a>
              </div>
            </div>
    
    
    
</div>
</div>  


<a id="btn2" class="btn btn-primary" style="margin-top: 50px; margin-bottom: 50px">ADD more catagories</a> 

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
                    Catagory
                </th>
                <th style="width: 30%"> 
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cat as $cat)      
                <tr>
                    <td>
                        {{$cat->id}}
                    </td>
                    <td>
                        {{$cat->name}}
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="/catagory/{{$cat->id}}/edit">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        
                      <!--  delete should not be used in catagories table because it is a foreign key
                         {!! Form::open(['action' => ['CatagoryController@destroy', $cat->id], 'method' => 'POST','class'=>'pull-right']) !!}        
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
