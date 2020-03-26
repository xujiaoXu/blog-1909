<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Goods;
use App\Cart;
use Illuminate\Support\Facades\Cache;

class GoodsController extends Controller
{
    // 详情
    public function Index($id){

        // $count=Cache::add('count_'.$id,1) ? Cache::get('count_'.$id):
        // Cache::increment('count_'.$id);
        $count = Redis::setnx('count_'.$id,1)?Redis::get('count_'.$id):Redis::incr('count_'.$id);
    	$goods = Goods::find($id);
    	// dd($goods);
    	return view('index.goods',['goods'=>$goods,'count'=>$count]);




    }


    public function addcart(Request $request){
    	// 判断用户是否登陆
    	   $user = session('user');
    	   // dd($user);
    	   if(!$user){
    	   	return json_encode(['code'=>'00003','msg'=>'用户未登录']);
    	   }

		$goods_id = $request->goods_id;
		$buy_number = $request->buy_number;
		// 根据商品id查询商品信息
		$goods = Goods::find($goods_id);
		// dd($goods);
		// 判断库存
		if($goods->goods_num<$buy_number){
    	   return json_encode(['code'=>'00004','msg'=>'库存不足']);
    	}


    	// 判断用户之前是否添加过此商品，如果添加过更改购买数量即可
    	$cart = Cart::where(['user_id'=>$user->id,'goods_id'=>$goods_id])->first();
		if($cart){
			// 库存判断
			$buy_number = $cart->buy_number+$buy_number;
			if($goods->goods_num<$buy_number){
				$buy_number=$goods->goods_num;
		} 
		// 更新购买数量
		$res = Cart::where('cart_id',$cart->cart_id)->update(['buy_number'=>$buy_number]);
	  }else{
		// 添加进购物车
    	   $data = [
    	   		'user_id'=>$user->id,
    	   		'goods_id'=>$goods_id,
    	   		'buy_number'=>$buy_number,
    	   		'goods_name'=>$goods->goods_name,
    	   		'goods_price'=>$goods->goods_price,
    	   		'goods_img'=>$goods->pic,
    	   		'addtime'=>time(),
    	   ];
    	   // dd($data);
    	   $res = Cart::create($data);
    	   }
    	   if($res){
    	   return json_encode(['code'=>'00000','msg'=>'添加成功']);
    	   }
		
		}	


        public function prolist(){
            // 全部商品
            // echo "全部商品";
            $goodsInfo = Goods::all();
            return view('index.prolist',['goodsInfo'=>$goodsInfo]);
        }


}
