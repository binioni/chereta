@extends('layouts.master')



@section('content') 




<!-- /.col -->
<div class="col-md-9">
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#view" data-toggle="tab">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="#add" data-toggle="tab">Add users</a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="view"> 
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Name
                            </th>
                            <th style="width: 15%">
                                Role
                            </th>
                            <th style="width: 25%">
                                Email
                            </th>
                            <th style="width: 35%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)      
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    {{$data->name}}
                                </td>
                                <td>
                                    {{implode(',', $data->roles()->get()->pluck('name')->toArray())}}
                                </td>
                                <td>
                                    {{$data->email}}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="/catagory/{{$data->id}}/edit">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach               
                            
                    </tbody>
                </table>
            </div>

            <div class="tab-pane" id="add">
                <div class="card-body p-0">
                    <p>this works2</p>
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
