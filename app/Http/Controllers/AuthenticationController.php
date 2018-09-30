<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
   public function logIn(Request $request){
       return view('login');
   }

   public function signUp(Request $request){
       return view('signup');
   }


   public function signUserUp(Request $request){


       $validatedData = $request->validate([
           'name' => 'required|max:255|min:3',
           'email' => 'required|email',
           'password' => 'required',
           'confirmPassword' => 'required|same:password',
       ]);

//       if ($validatedData->fails()) {
//           return redirect('/signup')
//               ->withErrors($validatedData, 'signup')
//               ->withInput();
//       }

       $users = DB::select('select * from user', [1]);


       $name = $request->get('name');
       $email = $request->get('email');
       $password = bcrypt($request->get('password'));

       if(DB::insert('insert into user (name, email, password) values (?, ?, ?)', [$name, $email, $password ])){
           return redirect('/login');
       }

   }


   public function logUserIn(Request $request){


       $validatedData = $request->validate([
           'email' => 'required|email',
           'password' => 'required',
       ]);

       $email = $request->get('email');
       $password = ($request->get('password'));
//        dd($email);
        //dd($password);

       $user = DB::table('user')->get();
//       $users = DB::table('user')->where('email', $email)->where('password', $password)->get();

      // print_r($users);
      // dd($password);
       if($user){

           return view('home', compact('user'));

       } else {
           return redirect('/login')
               ->withErrors('Wrong email or password', 'signup')
               ->withInput();
       }
   }

   public function test(Request $request){
       $users = DB::select('select * from user', [1]);

       dd($users);

   }
}
