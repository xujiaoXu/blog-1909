<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public  function goods(){
    	echo '我是商品';
    }

   public function add(){
        if(request()->isMethod('get')){
            return view('add');
        }
        if(request()->isMethod('post')){
            echo request()->name;
        }
    }
    public  function adddo(){
    		echo request()->name;
    		return redirect('/goods');
    }

     public  function show($goods_id,$goods_name){
    		echo $goods_id .'---'.$goods_name;
    }

    public  function new($goods_id = null){
    		echo $goods_id;
    }
	
	public  function cate($goods_id = null,$goods_name = null){
		echo "cate";
    		echo $goods_id.'=='.$goods_name;
    }


}
