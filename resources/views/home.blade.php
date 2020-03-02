
@extends('layouts.master')


@section('content') 

  @if(count($data) > 0)  
      @foreach($data as $datas)


      <div class="col-md-12 align-items-stretch">
        <div class="card bg-light">
          <div class="card-header text-muted border-bottom-0">
            Chereta
          </div>
          <div class="card-body pt-0">
            <div>
                <h2 class="lead"><b>{{$datas->title}}</b></h2>
                <p class="text-muted text-sm"><b>Description: </b> {{$datas->description}} </p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$datas->city}}</li>
                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + {{$datas->contact}}</li>
                </ul>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              <a href="#" class="btn btn-sm btn-primary">
                 More details
              </a>
            </div>
          </div>
        </div>
      </div>
        
      @endforeach
      {{$data->links()}}
  @else
        <P>no posts available</P>
  @endif

@endsection


