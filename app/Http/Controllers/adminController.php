<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
   function login(Request $request){
     
    $admin =  Admin::where([
      ['name','=',$request->name ],
      ['password','=',$request->password],
      ])->first();
      $name =$admin->name;
      return ;
   }
}
