<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\survey;
use DB;

class AdminpagesController extends Controller
{
     public function __construct()
    {
       // $this->middleware('auth',['except' =>['index','show']]);
        $this->middleware('auth');
        
    }
    
      public function approved()
    {
         $survey = DB::table('users')->select('*')->join('surveys', 'surveys.status_updated_by', '=', 'users.id')->where('surveys.status',1)->get();
        //$survey=survey::where('status','1')->orderBy('created_at','desc')->paginate(10);
       // return view('admin.approved-survey',compact('survey', 'userrole')); 
         return view('admin.approved-survey',compact('survey', $survey)); 
    }
    public function unapproved()
    {
        $survey = DB::table('users')->select('*')->join('surveys', 'surveys.status_updated_by', '=', 'users.id')->where('surveys.status',0)->get();
        return view('admin.unapproved-survey')->with('survey',$survey);
    }
}
