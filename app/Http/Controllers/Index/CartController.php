<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
class CartController extends Controller
{
    //购物车列表
    public function cartlist(){
    	$cartInfo = Cart::all();
    	$count = Cart::count();
    	return view('index.cartlist',['cartInfo'=>$cartInfo,'count'=>$count]);
    }

    public function confirm(){
        
        $goods_id = request()->goods_id;
        $user = request()->session()->get('user');
        $user_id = $user['id'];
        $goods_id=explode(',', $goods_id);
        $res = Cart::whereIn('goods_id',$goods_id)->where('user_id',$user_id)->get();
        $money = 0;
        foreach ($res as $k => $v) {
            $money+=$v['goods_price']*$v['buy_number'];
        }
    	return view('index.confirm',['money'=>$money,'res'=>$res]);
    }

     public function getMoney(){
        $goods_id=request()->goods_id;
        // echo $goods_id;
        $user=request()->session()->get('user');
        // dd($user);
        $user_id=$user['id'];
        // dd($user_id);
        //根据商品id得到单价和数量
        // $goodsModel = new Goods;
        // $cartModel = new Cart;
        
        // $where[] = ['in'=>['goods_id'=>$goods_id]];
        // dd($goods_id);
        $goods_id=explode(',',$goods_id);
        // dd($goods_id); 
        // $where=array('goods_id'=>$goods_id,'user_id'=>$user_id);
        $res=Cart::whereIn('goods_id',$goods_id)->where('user_id',$user_id)->get();
        // dd($res);
        // //获取总价
        $money=0;
        foreach($res as $k=>$v){
            $money+=$v['goods_price']*$v['buy_number'];
        }
        // dd($money);
        return $money;
    }
}
