@extends('layouts.app')
@include('inc.sidemenuforadminuser')
@include('inc.messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-2"></div>
        <div class="col-md-10">
            
                <h2>Dashboard</h2>
                <hr>
            

                 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                 
            </div>
        </div>
    </div>
</div>
@endsection
