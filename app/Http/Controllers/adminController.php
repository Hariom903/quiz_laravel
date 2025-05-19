<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
   function login(Request $request){
     $validetion = $request->validate([
      'name'=>'required',
      'password'=>'required'
     ]);
    $admin =  Admin::where([
      ['name','=',$request->name ],
      ['password','=',$request->password],
      ])->first();
      if(!$admin){
         $request->validate([
            'user'=>"required",
         ],
      [
         "user.required"=>"user not exist",
      ]
   );
      }
      Session::put("user", $admin);
      return redirect('dashboard');


   }
   function dashboard(){
      
   $user=   Session::get('user');
   if($user){

   
    return view('admin',['name'=>$user->name]);
   }
   else{
      return redirect('admin-login');
   }
}
}


