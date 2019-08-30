<?php

namespace App\Http\Controllers;
use App\survey;
use App\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    function processajax()
    {
    	if($_POST['sid'])
    	{
    		$surveyid=$_POST['sid'];
    		$survey=survey::find($surveyid);
    		$survey->status=1;
    		$survey->status_updated_by=auth()->user()->id;
    	    $survey->save(); 
    	}
    	 
    }
    function processajaxunapp()
    {
    	if($_POST['sid'])
    	{
			$surveyid=$_POST['sid'];
    		$survey=survey::find($surveyid);
    		$survey->status=0;
    		 $survey->status_updated_by=auth()->user()->id;
    		$survey->save();
    	}
    }

    
}
