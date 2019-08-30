@extends('layouts.app')
@include('inc.sidemenu')
@include('inc.messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    	 <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card" >
                <div class="card-header" style="background: #31353d;text-align: center;color: white;"><h2>Approved Surveys</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     @if(count($survey)>0)
                      @foreach($survey as $surveys)
                       <p><b><img src="public/storage/cover_img/{{$surveys->profile_img}}" style="width: 10%"></b> </p>
                      <p><b>Name: </b> {{$surveys->name}} </p>
                        <p><b>Email ID: </b>{{$surveys->email}}</p>
                         <p><b>Company Name: </b>{{$surveys->comp_name}}</p>
                        <p><b>Survey: </b>{{$surveys->survey}} </p>
                      <small style="float: right;">Approved By <b style="font-size: 15px">{{$surveys->name}}</b> Posted on {{$surveys->created_at}}</small>
                      	<input type="hidden" class="sid"   value="{{$surveys->id}}"> 
                   
               		  <a style="color:white" class="btn btn-danger button-unapp"  >Un-Approve</a>
                     <a style="color:white" class="btn btn-primary"  >Edit</a>  
                    <a style="color:white" class="btn btn-danger"  >Delete</a>  
              


                     <br><hr>
                   
                    @endforeach
                      @else
                  <p>Oops...No Record Found...!</p>
                @endif
 
                
                  
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
    
    $('.button-app').each(function(){
        
        $(this).click(function(){
            var sid = $(this).prev().val();
            $.ajax({
  method: "POST",
  url: "processajax",
  data: { sid: sid }
})
 
  .done(function( msg ) {
    //alert( "Data Saved: " + msg ).val();
     location.reload(true);
 //$('#unapp').show(); 
  }) 
  .fail(function(xhr, status, error) {
    alert( error );
  });
        });

    });

 ///////////////////un approve////////////////
     $('.button-unapp').each(function(){
        
        $(this).click(function(){
            var sid = $(this).prev().val();
            $.ajax({
  method: "POST",
  url: "processajaxunapprove",
  data: { sid: sid }
})
 
  .done(function( msg ) {
    //alert( "Data Saved: " + msg ).val();
     location.reload(true);
 //$('#unapp').show(); 
  }) 
  .fail(function(xhr, status, error) {
    alert( error );
  });
        });

    });

});



 

</script>

@endsection