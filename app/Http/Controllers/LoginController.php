<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Admin;

class LoginController extends Controller
{
    public function login(){
    	return view('login');
    }
    public function logindo(){
    	$post = request()->except('_token','rember');
    	// dd($post);
    	$post['pwd'] = md5($post['pwd']);
    	// dd($post['pwd']);
    	$adminuser = Admin::where($post)->first();

     
    	if($adminuser){
            if(isset($post['remember'])){
                //记住密码走七天免登录 把用户信息存入cookie
                Cookie::queue('adminuser',$res,7*24*60);
            }
    		session(['adminuser'=>$adminuser]);
    		return redirect('/brand/index');

    	}
    		return redirect('/login')->with('msg','用户名或密码错误');
    }


}
 
