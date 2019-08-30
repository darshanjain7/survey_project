@extends('layouts.app1')
@include('inc.messages')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h2>Post Your Survey</h2>
            <div class="card">
                
 
                <div class="card-body">

 <form action="{{ action('PostsController@store')}}" method="post"  enctype="multipart/form-data">
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
    <label for="email">Company Name:</label>
    <input type="text" class="form-control" name="cname" required="">
  </div>
  <div class="form-group">
    <label for="email">Survey:</label>
    <textarea type="text" class="form-control" name="survey" required="">
    	</textarea> 
  </div>
  <div class="form-group">
        <label for="">Profile Image</label>
        <input   type="file"   name="file_upload"> 
  </div>
   

  
  <button type="submit" class="btn btn-success">Publish</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection