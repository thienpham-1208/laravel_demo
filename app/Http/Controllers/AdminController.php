<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

session_start();
class AdminController extends Controller
{
    public function showLogin(){
        if(isset($_COOKIE['name'])){
            return view('pages.admin.index');
        }
        return view('pages.admin.login');
    }
    public function login(Request $request){
        
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        $admin = Admin::where('email',$email)->where('password',$password)->first();
       
        if($admin){
           $_SESSION['email'] = $admin['email'];
           $_SESSION['name'] = $admin['name'];
           if($remember!=''){
               setcookie('name',$admin['name'],time()+300);
           }
            return view('pages.admin.index');
           
        }else{
            return back()->with('message',"Thong tin dang nhap khong dung! Moi thu lai.");
        }
        
    }
    public function logout(){
        if(isset($_COOKIE['name'])){
            setcookie('name',"",time()-360);     
        }
        
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        return view('pages.admin.login');
    }
}
