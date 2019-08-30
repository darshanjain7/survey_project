@extends('layouts.app1')
 @include('inc.messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Recent Posts/Surveys</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       
                     @if(count($survey)>0)

                   
                     @foreach($survey as $surveys)
                     @if($surveys->status==1)
                     <div class="row">
                        <div class="col-md-1"><img src="public/storage/cover_img/{{$surveys->profile_img}}" style="width: 90%"> </div> <div class="col-md-11"><p><b>Survey/Posts:</b>  {{$surveys->survey}} </p></div><p> 
                        <div class="col-md-1" style="text-align: center;"><b >{{$surveys->name}}</b> </div><div class="col-md-11"><p>  </p></div>
                           </div>
                      <small style="float: right;">Posted on <b>{{$surveys->created_at}}</b></small>
                     <br><hr>
                  
                     @endif
                    @endforeach
 
                @endif   
                   
                  
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
