<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Qusetions;
use Illuminate\Contracts\Pagination\Paginator;
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
         "user.required"=>" User name and password wrong  ",
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

function categray(Request $request){
  

   //  return $categories;
  $user=   Session::get('user');
   if($user){
       $categories = Category::with('admin');
          if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $categories->where('name', 'like', '%' . $searchTerm . '%');
            
        }
        $categories =  $categories->paginate(4);
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
    if(!$user){
      return redirect('admin-login');
    }else{
    $category = new Category();
    $category->name = $request->cat;
    $category->admin_id = $user->id;
   if( $category->save()){
  return redirect('categray')->with('success', 'Category created successfully!');

   }
}

}
function delete_category($id){
 $isdelete = Category::where("id", $id)->delete();
 if($isdelete){
  return redirect('categray')->with('success', 'Category Deleted successfully!');
 }
}
function add_quiz(){
    $user=Session::get('user');
   if($user){
    $quiz = request('quiz');
    $cat = request('category');
    if($quiz && $cat && !Session::has('quiz') ){
      $quizadd = new Quiz();
      $quizadd->name = $quiz;
      $quizadd->categories_id=$cat;
       $quizadd->admin_id =  $user->id;

      if($quizadd->save()){
        Session::put('quiz',$quizadd);
      }
    }
      $categories = Category::all();
       $total = 0;
        $quiz=Session::get('quiz');
        $total = Qusetions::where("quiz_id", $quiz->id)->count();
    return view("quiz",['name'=>$user->name,"categories"=>$categories,"total"=>$total]);
   }
   else{
      return redirect('admin-login');
   }

}
function add_qus(Request $request){
 $user=   Session::get('user');
 if(!$user){
     return redirect('admin-login');
 }
 else{
 $quiz=Session::get('quiz');

  if($quiz){
    $addqus = new Qusetions();
    $addqus->qus = $request->qus;   
    $addqus->op1 = $request->A;   
    $addqus->op2 = $request->B;   
    $addqus->op3 = $request->C;   
    $addqus->op4 = $request->D;   
    $addqus->ans = $request->ans;   
    $addqus->admin_id =  $user->id;
    $addqus->quiz_id =  $quiz->id;
    if($addqus->save()){
       
       if($request->submit=='addandnext'){
   return redirect()->back();


       }
       else
       {
           Session::forget('quiz');

           $categories = Category::all();
    return view("quiz",['name'=>$user->name,"categories"=>$categories]);
       }
    }
  }

}
}

}


