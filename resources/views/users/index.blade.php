@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col float-left col-3 mr-5">
        <div class="card" style="width: 28rem;">
            <div class="card-header text-center">
                <h5 class="card-title text-center ml-5"><strong>Advanced Search</strong></h5>
            </div>
            <div class="card-body">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="keyWord" class="form-control">
                    <label for="keyWord">Keyword </label>
                </div>
                <div class="md-form mt-5">
                  {{Form::label('company', 'Companies')}}
                  <select class="browser-default custom-select" name="mycompanies">
                    <option selected>Select Reagion</option>
                    @if ($city->count())
                
                        @foreach($city as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>  
                        @endforeach  
                
                    @endif    
                </select>
                </div>
                <div class="md-form mt-5">
                    <input  type="date" id="openDate" class="form-control datepicker">
                    <label for="openDate">Open Date</label>
                </div>
                <div class="md-form mt-5">
                    <input  type="date" id="closeDate" class="form-control datepicker">
                    <label for="openDate">Close Date</label>
                </div>
                <div class="md-form">
                  <label for="catagory mb-5">Catagory</label>
                  <select class="custom-select mt-5" multiple id="catagory" name="mycatagories">
                    @if ($cat->count())
                
                        @foreach($cat as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>  
                        @endforeach  
                
                    @endif    
                </select>
                </div>
                <div class="md-form">  
                    <button type="button" class="btn btn-block btn-success btn-rounded">Search <i class="fas fa-search float-right" ></i></button>
                </div>
                
            </div>
        </div>
    </div>
    @if(count($data) > 0)  
    
    <div class="col-6" >
      @foreach($data as $data)
            <div class="card text-center">
                <div class=" card-header  ">
                    <div class="row">
                        <div class="col-4"><h3 class="text-left">{{$data->title}}</h3></div>
                        <div class="col-4 text-right"></div>
                        <div class="col-4"><strong class="float-right">Biding: <i class="text-success">open</i></strong></div> {{-- work this out  --}}
                    </div>
                    
                    {{-- <h3 class="text-left">Sector</h3>
                    <strong class="float-right">Biding: <i class="text-success">open</i></strong> --}}
                </div>
                <div class="card-body">
                  <h4 class="card-title text-left"><blockquote class="blockquote bq-primary">
                    <p class="bq-title">Description</p>
                    <p>{{$data->description}}
                    </p>
                  </blockquote></h4>
                  <h4 class="text-left"><strong>Open Date: </strong> <i class="ml-5">{{$data->open}}</i></h4>
                  <h4 class="text-left"><strong>Close Date: </strong> <i class="ml-5">{{$data->close}}</i></h4>
                  <h4 class="text-left"><strong>Location: </strong> <i class="ml-5">Adama,shewa,Oromia,Ethiopia</i></h4>
                  <a class="btn btn-success btn-sm float-right">More detail</a>
                </div>
                <div class="card-footer text-muted text-left">
                  <p class="mb-0"><strong>Posted at: </strong> {{$data->created_at}}</p>
                </div>
              </div>
              <!--/.Panel-->
        
      @endforeach
    </div>
    @endif
    <div class="float-right col-2">
        <div class="list-group">
            <a href="#!" class="list-group-item list-group-item-action flex-column align-items-start active">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-2 h5">Most visited tenders</h5>
              </div>
            </a>
            <hr>
            <a href="#!" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-2 h5">Sector Name</h5>
              </div>
              <div class="text-right">
                <small class="text-muted text-right mb-2">3 days ago</small>
              </div>
              
              <p class="mb-2">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
                blandit.</p>
              <small class="text-muted">Donec id elit non mi porta.</small>
            </a>
            <hr>
            <a href="#!" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-2 h5">Sector Name</h5>
                </div>
                <div class="text-right">
                  <small class="text-muted text-right mb-2">3 days ago</small>
                </div>
                
                <p class="mb-2">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
                  blandit.</p>
                <small class="text-muted">Donec id elit non mi porta.</small>
            </a>
        </div>
    </div>
</div>
@endsection