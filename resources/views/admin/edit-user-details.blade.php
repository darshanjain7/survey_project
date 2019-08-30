@extends('layouts.app')
  @include('inc.sidemenu')
  @include('inc.messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         
            <div class="card"  >
               <div class="card-header" style="background: #31353d;text-align: center;color: white;">  <h2>Update User</h2> </div>
 
                <div class="card-body">

 <form action="../../admin/{{$user->id}}" method="post">
@csrf
@method('put')
  <div class="form-group">
    <label for="email">User Name:</label>
    <input type="text" class="form-control" name="username" value="{{$user->name}}" required="">
  </div>
   <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" value="{{$user->email}}" required="">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd" value="{{$user->password}}" disabled required="">
  </div>

   <div class="form-group">
    <label for="pwd">User Role:</label>
    <select  class="form-control" name="user_role" required="">


      <option value="">Select User Role</option>
  <option  <?php if($user->user_role=='2') {?>selected='selected'<?php } ?>  value="2">Operations manager</option>
  <option <?php if($user->user_role=='3')   {?>selected='selected'<?php } ?> value="3">Quality control Manager</option>
  <option  <?php if($user->user_role=='4')   {?>selected='selected'<?php } ?> value="4">Office manager</option>
  <option  <?php if($user->user_role=='5')  {?>selected='selected'<?php } ?> value="5">Marketing manager</option>
</select>
  </div>
  
  <button type="submit" class="btn btn-success">Update User</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
