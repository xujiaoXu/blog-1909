<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use DB;
use App\Goods;
use App\Cate;

class IndexController extends Controller
{
    //首页
    public function index(){
        // 先去缓存读取数据
        // $res = Cache::get('is_show');
        // $res2 = Cache::get('pid');
        // $res3 = Cache::get('is_jing');
        // $res4 = Cache::get('is_new');
        // 全局辅助函数的方式进行
        // $res =cache('is_show');
        // Redis
        $res = Redis::get('is_show');
        // dd($res);
        $res2=cache('pid');
        $res3=cache('is_jing');
        $res4=cache('is_new');
        // Redis::flushall();
        // dd($res);

       
            // Cache::flush();
            // var_dump($res);
        if (!$res) {
            // echo "这是is_show";
             $res = Goods::getShowData();
             // dd($res);
             // 存入memcached
             // Cache::put('is_show',$res,60*60*24);
             // 全局辅助函数的方式
             // cache(['is_show'=>$res],60*60*24);
             // Redis
             $res = serialize($res);
            Redis::setex('is_show',60*60*24,$res);
        }
        $res = unserialize($res);

        if (!$res2) {
            // echo "这是pid";
              // $res2 = Cate::where('pid',0)->get();
            $res2 = Cate::getPidData();
             // Cache::put('pid',$res2,60*60*24);
              // 全局辅助函数
             cache(['pid'=>$res2],60*60*24);

        }
    	// dd($res2);
        if (!$res3) {
            // echo "这是精品";
             // $res3 = Goods::where('is_jing','是')->take(3)->get();
                $res3 = Goods::getJingData();
             // Cache::put('is_jing',$res3,60*60*24);
             // 全局辅助函数
             cache(['is_jing'=>$res3],60*60*24);
        }
        if (!$res4) {
            // echo "这是新品";
            // $res4 =Goods::where('is_new','否')->take(4)->get();
                $res4 = Goods::getNewData();
             // Cache::put('is_new',$res4,60*60*24);
            // 全局辅助函数
             cache(['is_new'=>$res4],60*60*24);
        }
    	// dd($res4);
    	
    	return view('index.index',['res'=>$res,'res2'=>$res2,'res3'=>$res3,'res4'=>$res4]);
    }
}
