@extends('layouts.app')
@include('inc.sidemenu')
@include('inc.messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card" >
               
                <div class="card-header" style="background: #31353d;text-align: center;color: white;"><h3>User Details</h3></div>

                @if($users!='') 
                <table class="table">
        <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email ID</th>
      <th scope="col">Role</th>
       <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
                
                @foreach($users as $user)
                @if($user->user_role!=1)

    <tr>
      <th scope="row"> {{$user->id}}</th>
      <td> {{$user->name}}</td>
      <td> {{$user->email}}</td>
      <td> {{$user->rolename}} </td>
     <!-- <td> @if($user->user_role==1) 
          Admin 
          @elseif($user->user_role==2)
          Operations manager
          @elseif($user->user_role==3)
          Quality control Manager
          @elseif($user->user_role==4)
          Office manager
          @elseif($user->user_role==5)
          Marketing manager
        
        @endif
      </td>-->
      <td> <a class="btn btn-primary" href="../admin/{{$user->id}}/edit" >Edit</a> </td>
      <td>
        <form method="post" action="../admin/{{$user->id}}">
          @csrf
          @method('delete')
 <button type="submit" class="btn btn-danger" >Delete</button>
        </form>

      </td>
    </tr>
    
 
                @endif
                @endforeach
                 </tbody>
                </table>

         @endif    


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                  @endif 
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
