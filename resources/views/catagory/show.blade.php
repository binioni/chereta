@extends('layouts.master')



@section('content') 


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


@endsection