@extends('layouts.app')
  @include('inc.sidemenu')
  @include('inc.messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
            <div class="card"  >
               <div class="card-header" style="background: #31353d;text-align: center;color: white;"><h2>Create User</h2>  </div>
 
                <div class="card-body">

 <form action="{{ action('UsersController@store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="email">User Name:</label>
    <input type="text" class="form-control" name="username" required="">
  </div>
   <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" required="">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd" required="">
  </div>

   <div class="form-group">
    <label for="pwd">User Role:</label>
    
    

     <select  class="form-control" name="user_role" required="">
 <option value="">Select User Role</option>
 @foreach($list->all() as $val)
  <option value="{{$val->id}}">{{$val->rolename}}</option>
 @endforeach
</select>  
 
  </div>
  
  <button type="submit" class="btn btn-success">Create User</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
