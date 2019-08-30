@extends('layouts.app')
  @include('inc.sidemenu')
  @include('inc.messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         
            <div class="card"  >
                 <div class="card-header" style="background: #31353d;text-align: center;color: white;"> <h2>Create User Role</h2></div>
 
                <div class="card-body">

 <form action="{{ action('UserroleController@store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="email">User Role Name:</label>
    <input type="text" class="form-control" name="userroll" required="">
  </div>
   <div class="form-group">
     <label for="email">Role Access:</label><br>
   <label class="checkbox-inline">
      <input type="checkbox" name="access[]" value="1">View Only&nbsp;&nbsp;&nbsp;
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name="access[]" value="2">Update Status&nbsp;&nbsp;&nbsp;
    </label>
     <label class="checkbox-inline">
      <input type="checkbox" name="access[]" value="2">Delete
    </label>
  
  </div>
   
  
  <button type="submit" id="checkBtn" class="btn btn-success">Create User Role</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>
@endsection
