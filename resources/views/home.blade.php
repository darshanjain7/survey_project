@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <a href="posts/create" class="btn btn-primary">Create Post</a>

                    @if(count($posts)>0)
                     <table class="table table-striped">
                    <tr>
                        <th>User</th>
                        <th>Post Title</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                     @foreach($posts as $post)
                    <tr>
                        <td width="10%"  ><img class="rounded-circle" src="public/storage/cover_img/{{$post->cover_img}}" style="width: 100%"></td>
                        <td><a href="posts/{{$post->id}}">{{$post->title}}</a></td>
                        <td><a class="btn btn-primary" href="posts/{{$post->id}}/edit">Edit</a></td>
                        <td>
                            <form method="post" action="posts/{{$post->id}}">
                                 @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Delete" name="submit">
                            </form>
  </td>

                    </tr>
                    @endforeach
                </table>
                @endif    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
