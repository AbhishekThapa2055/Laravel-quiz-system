<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
class AdminController extends Controller
{
 function login(Request $request)
 {
    $validation = $request->validate([
        "name"=>"required",
        "password"=>"required"
    ]);
    $admin = Admin::where(
        [
            ['name',"=",$request->name],
            ['password',"=",$request->password]
        ]
        
    )->first();
    if(!$admin){
        $validation = $request->validate([
            "user"=>"required",
        ],[
            "user.required"=>"Incorrect Credentials!!!"
        ]);

    }
    Session::put('admin',$admin);
    return redirect('dashboard');
 }
 function dashboard()
 {
    $admin = Session::get('admin');
    if($admin){
    return view('admin',["name"=>$admin->name]);
    }
    else{
        return redirect('admin-login');
    }

 }
 function categories()
 {
    $admin = Session::get('admin');
    $categories = Category::paginate(5);
    if($admin){
        return view('categories',["name"=>$admin->name,"categories"=>$categories]);

    }
    else{
        return redirect('admin-login');
    }
 }

 function logout(){
    Session::forget('admin');
    return redirect('admin-login');
 }
 function addCategory(Request $request)
 {
    $categories = Category::get();
    $admin = Session::get('admin');
    $category = new Category();
    $category->name = $request->category;
    $category->creator = $admin->name;
    if($category->save()){
    Session::flash('category',"Category"." ".$request->category." "."Added");

    }

    return redirect('admin-categories');
 }

}

