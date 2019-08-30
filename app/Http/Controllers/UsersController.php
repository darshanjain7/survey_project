<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\survey;
use App\Userrole;
use DB;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth',['except' =>['index','show']]);
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Users=User::all();
         
         $total_projects = User::where('user_role', '!=', '1')->count();


          $total_projects1 = survey::count();
          $unapprove=survey::where('status','0')->count();
          $approve=survey::where('status','1')->count();

          return view('admin.index')->with(['total'=>$total_projects,'totsurvey'=>$total_projects1,'unapprove'=>$unapprove,'approve'=>$approve]);
       
          

         //  return view('admin.view-users')->with('users',$Users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $list = Userrole::all();

   // return view('admin.create-user', array('list' => $list));

         return view('admin.create-user')->with('list',$list);
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   $this->validate($request,['user_name' => 'required','email' => 'required','pwd' => 'required','user_role' => 'required']);
        $user=new User;
         $this->validate($request,['email' => [
        'required',
        Rule::unique('users')->ignore($user->id),
    ],]);  
 

        
        $user->created_by=auth()->user()->id;
        $user->name=$request->input('username');
        $user->email=$request->input('email');
        $pass1=$request->input('pwd');
        $hashedPassword = Hash::make($pass1);
        $user->password=$hashedPassword;
        $user->user_role=$request->input('user_role');

 
         
        $user->save();
        
        return redirect('/admin')->with('success','User Saved');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    $users = DB::table('users')->select('*')->join('userroles', 'userroles.id', '=', 'users.user_role')->get();

      //return $users;
       // $users=User::orderBy('created_at','desc')->paginate(10);
        return view('admin.view-users')->with('users',$users);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
         
        return view('admin.edit-user-details')->with('user',$user);
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
        $user=User::find($id);
        $user->name=$request->input('username');
        $user->email=$request->input('email');
        $pass1=$request->input('pwd');
        $hashedPassword = Hash::make($pass1);
        $user->password=$hashedPassword;
        $user->user_role=$request->input('user_role');
        $user->save();
        
        return redirect('/admin/show')->with('success','User Updated');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user= User::find($id);

          
          $user->delete();
         return redirect('/admin/show')->with('success','User Deleted');
    }
}
