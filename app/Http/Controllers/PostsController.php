<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\survey;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
         
         $survey=survey::orderBy('created_at','desc')->paginate(10);
        return view('welcome')->with('survey',$survey);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('survey.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         
         if($request->hasFile('file_upload'))
        {
            //get the image with extension 
              $fileNamewithext=$request->file('file_upload')->getClientOriginalName();   //get the image name
            $fileName=pathinfo($fileNamewithext,PATHINFO_FILENAME);
            //get image ectension
            $fileetx=$request->file('file_upload')->getClientOriginalExtension();
            //file name to upload
            $fileNameToUpload=$fileName .'.'. time(). '.' . $fileetx;

            $path=$request->file('file_upload')->storeAs('public/cover_img',$fileNameToUpload);

        }
        else
        {
            $fileNameToUpload='no-image.png';
        }
         $survey=new survey;
        $survey->name=$request->input('username');
        $survey->email=$request->input('email');
        $survey->comp_name=$request->input('cname');
        $survey->survey=$request->input('survey');
        $survey->profile_img=$fileNameToUpload;
 
        $survey->save();
        
        return redirect('/')->with('success','Your Survey Under Review');   
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $survey=survey::orderBy('created_at','desc')->paginate(10);
        return view('welcome')->with('survey',$survey);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
