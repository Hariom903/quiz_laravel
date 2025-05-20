<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
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

function categray(){
   $categories = Category::with('admin')->get();

   //  return $categories;
   

      
   $user=   Session::get('user');
   if($user){
    return view('categories',['name'=>$user->name,"categories"=>$categories]);
   }
   else{
      return redirect('admin-login');
   }
}
function logout(){
  session()->forget('user');
    return redirect('admin-login');
}

function add_category(Request $request){
   $validetion = $request->validate([
   'cat'=>'required |min:4 |unique:categories,name',
   ]);
    $user=   Session::get('user');
    $category = new Category();
    $category->name = $request->cat;
    $category->admin_id = $user->id;
   if( $category->save()){
  return redirect('categray')->with('success', 'Category created successfully!');

   }

}
function delete_category($id){
 $isdelete = Category::where("id", $id)->delete();
 if($isdelete){
  return redirect('categray')->with('success', 'Category Deleted successfully!');
 }
}
function add_quiz(){
    $user=   Session::get('user');
   if($user){
    return view("quiz",['name'=>$user->name]);
   }
   else{
      return redirect('admin-login');
   }

}
}


