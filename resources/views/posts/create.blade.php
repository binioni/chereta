@extends('layouts.master')



@section('content') 

<script>
  const regex = /myform/gi;   //this will find the form 'myform' id in the div
  const regex2 = /qqq/gi;     //this will find the form 'qqq' id in the div
  const regex22 = /mytitle/gi;
  const regex3 = /mycontact/gi;
  const regex4 = /myrequirment/gi;
  const regex5 = /mycity/gi;
  const regex6 = /mydiscription/gi;
  const regex7 = /mycatagories/gi;
  const regex8 = /mycompanies/gi;
  const regex9 = /myopen/gi;
  const regex10 = /myclose/gi;
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
                 replace(regex22, "mytitle_"+num).
                 replace(regex3, "mycontact_"+num).
                 replace(regex4, "myrequirment_"+num).
                 replace(regex5, "mycity_"+num).
                 replace(regex6, "mydiscription_"+num).
                 replace(regex7, "mycatagories_"+num).
                 replace(regex8, "mycompanies_"+num).
                 replace(regex9, "myopen_"+num).
                 replace(regex10, "myclose_"+num)
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
        <li class="nav-item"><a class="nav-link active" href="#edit_post" data-toggle="tab">Edit Posts</a></li>
        <li class="nav-item"><a class="nav-link" href="#add_post" data-toggle="tab">Add Posts</a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane" id="add_post">
          <h1>Create post</h1>
   
          {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
          {{Form::number('num', '', ['value'=>0,'id'=>'form_num','class' => 'form-control',"hidden"=>true])}}
          <div id="append"></div>   <!-- div that contains all and the hiddden form -->
          {{Form::submit('Post Chereta', ['class'=>'btn btn-primary', 'id'=>'submitbtn','style'=>'width: 100%' ,'hidden'=>true])}}   
          {!! Form::close() !!}
        
          <div id="temp" hidden>    <!-- div that contains the hiddden form will be added to the above form when the add button is clicked -->
          <div class="formele card card-primary" style="padding:5px" id="myform">
            <div class="card-header">
              <h3 class="card-title">Add Post</h3>
              <a onclick="delete_form('qqq')" style="float:right" class="btn btn-danger">X</a> <!-- it will delete the form by sending 'qqq' as id and the regex will change it to the actual id -->
          
            </div>
            
            
            <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('mytitle', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>  
          
            <div class="form-group">
              {{Form::label('contact', 'Phone-adress')}}
              {{Form::number('mycontact', '', ['class' => 'form-control', 'placeholder' => 'Phone-number'])}}
            </div>
        
            <div class="form-group">
              {{Form::label('requirment', 'Requirment')}}
              {{Form::text('myrequirment', '', ['class' => 'form-control', 'placeholder' => 'Requirment'])}}
            </div>
        
            <div class="form-group">
              {{Form::label('city', 'City')}}
              {{Form::text('mycity', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
            </div>
        
            <div class="form-group">
              {{Form::label('discription', 'Description')}}
              {{Form::textarea('mydiscription', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
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
                
            
            
        </div>
        </div>  
        
        
        <a id="btn2" class="btn btn-primary" style="margin-top: 50px; margin-bottom: 50px">ADD more forms</a> 
        
        
        
        </div>

        <div class="active tab-pane" id="edit_post">
          <h1>Posts</h1>  
          @if(count($data) > 0)  
              @foreach($data as $datas)
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="m-0">Featured</h5>
                  </div>
                  <div class="card-body">
                    <h3>{{$datas->title}}</a></h3>
                    <small><b>Bid opened in: </b>{{$datas->open}}</small><br>
                    <small><b>Bid will be closed at: </b>{{$datas->close}}</small><br>
                    <a class="btn btn-info btn-md" href="/posts/{{$datas->id}}/edit">Edit</a>
                    
                  </div>
                </div>
                
              @endforeach
              {{$data->links()}}
          @else
                <P>no posts available</P>
          @endif
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





 

















































<!-- 




  <h1>Insert Companies</h1>
  <div id="append"></div>   
  <div id="temp" hidden class="container">    
  <div id="myform">
    <a onclick="delete_form('qqq')" style="float:right" class="btn btn-danger">X</a> 

  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
  <table class="table">
    <tr id="order">
      <td id="list">
        <div class="form-group">
          {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Company name'])}}
        </div>
      </td>

      <td>
        <div class="form-group">
          {{Form::text('company', '', ['class' => 'form-control', 'placeholder' => 'Companies work'])}}
        </div>
      </td>

      <td>
        <div class="form-group">
          {{Form::number('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone-address'])}}
        </div>
      </td>
      
      <td>
        <div class="form-group">
          <select class="form-control m-bot15" name="cat_id">
            @if ($city->count())
        
                @foreach($city as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>  
                @endforeach  
        
            @endif    
        </select>
        </div>
      </td>

      <td>
        <div class="form-group">
          {{Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'Company Website'])}}
        </div>
      </td>

      <td>
        <div class="form-group">
          {{Form::text('facebook', '', ['class' => 'form-control', 'placeholder' => 'Facebook adress'])}}
        </div>
      </td>

      <td>
        {{Form::submit('Add Companies', ['class'=>'btn btn-primary'])}}
      </td>
    </tr>
  </table>
  
    
    
  {!! Form::close() !!}
  
    


</div>

</div>

<a id="btn2" class="btn btn-primary">ADD Companies</a>

-->