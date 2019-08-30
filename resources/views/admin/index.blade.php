@extends('layouts.app')
@include('inc.sidemenu')
@include('inc.messages')
@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-2"></div>
        <div class="col-md-10">
            
                <h2>Dashboard</h2>
                <hr>
                
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="offer offer-success">
                <div class="shape">
                    <div class="shape-text">
                        top                             
                    </div>
                </div>
                <a href="<?php echo url('admin/show');?>    " style="text-decoration: none;color: black;">
                <div class="offer-content">
                    <h3 class="lead">
                       Number of Users
                    </h3>                       
                    <h3>
                        <b>{{ $total }}</b>
                    </h3>
                </div>
                </a>
            </div>
        </div>
         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="offer offer-success">
                <div class="shape">
                    <div class="shape-text">
                        top                             
                    </div>
                </div>
                  <a href="<?php echo url('survey/show');?>    " style="text-decoration: none;color: black;">
                <div class="offer-content">
                    <h3 class="lead">
                       Number of Surveys
                    </h3>                       
                    <h3>
                        <b>{{ $totsurvey }} </b>
                    </h3>
                </div>
            </a>
            </div>
        </div>
           <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="offer offer-success">
                <div class="shape">
                    <div class="shape-text">
                        top                             
                    </div>
                </div>
                  <a href="<?php echo url('approved');?>    " style="text-decoration: none;color: black;">
                <div class="offer-content">
                    <h3 class="lead">
                       Approved Survey
                    </h3>                       
                    <h3>
                        <b>{{ $approve }} </b>
                    </h3>
                </div>
            </a>
            </div>
        </div>
        
             <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="offer offer-success">
                <div class="shape">
                    <div class="shape-text">
                        top                             
                    </div>
                </div>
                  <a href="<?php echo url('unapproved');?>    " style="text-decoration: none;color: black;">
                <div class="offer-content">
                    <h3 class="lead">
                       Un Approved Survey
                    </h3>                       
                    <h3>
                        <b>{{ $unapprove }} </b>
                    </h3>
                </div>
            </a>
            </div>
        </div>
      

     
        </div>

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
