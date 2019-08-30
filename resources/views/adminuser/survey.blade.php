@extends('layouts.app')
@include('inc.sidemenuforadminuser')
@include('inc.messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    	 <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card" >
                <div class="card-header" style="background: #31353d;text-align: center;color: white;"><h2>Recent Posts/Surveys</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <?php foreach($userrole as $userroles)
                      $useraccess= $userroles->access_type;
                      
                     $row = str_getcsv($useraccess);
                     // print_r($row);
                     
                             ?>
                     @if(count($survey)>0)
                     
                   
                   
                     @foreach($survey as $surveys)
                    
                    
                        <p><b>Name: </b> {{$surveys->name}} </p>
                        <p><b>Email ID: </b>{{$surveys->email}}</p>
                         <p><b>Company Name: </b>{{$surveys->comp_name}}</p>
                        <p><b>Survey: </b>{{$surveys->survey}} </p>
                      <small style="float: right;">Posted on {{$surveys->created_at}}</small>
                      	<input type="hidden" class="sid"   value="{{$surveys->id}}"> 
                        
                    
                    @foreach($row as $value)
                     @if($value == 2)
                      @if($surveys->status==0)
                        <a  style="color:white" class="btn btn-success button-app">Approve</a>
                         @else
                        <a style="color:white" class="btn btn-danger button-unapp"  >Un-Approve</a>
                      @endif
                      @endif
                      @if($value == 3)
                      <a style="color:white" class="btn btn-danger button-unapp"  >Delete</a>

                     @endif
                      @endforeach


                      


                	    


                     <br><hr>
                   
                    @endforeach
 
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
           // alert(sid);
            $.ajax({
  method: "POST",
  url: "../processajax",
  data: { sid: sid }
})
 
  .done(function( msg ) {
  //   alert( "Data Saved: " + msg );
     location.reload(true);
  
  }) 
  .fail(function(xhr, status, error) {
  //  alert( error +' ' + status + ' ' + xhr);
  });
        });

    });

 ///////////////////un approve////////////////
     $('.button-unapp').each(function(){
        
        $(this).click(function(){
            var sid = $(this).prev().val();
            $.ajax({
  method: "POST",
  url: "../processajaxunapprove",
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