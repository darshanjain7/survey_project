<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

use DB;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

       /*  $email=$request->input('email');

         echo $email;
         die();

        //$email1 = DB::table('users')->where('email', $email)->first();
         // $email1=User::where('email',$email)->first();

          return $email;
        */
         if(Auth::user())
         {
             if(Auth::user()->user_role=="1")
            {
           

        //return  view('admin.index')->with('user',Auth::user());
                return redirect('/admin');
 
            //return view('admin.index');
            }
            else
            {
                return redirect('/adminuser');
            }
         }
         else
         {
             return redirect('/login');
         }
       
        return $next($request);
        
    }
}
