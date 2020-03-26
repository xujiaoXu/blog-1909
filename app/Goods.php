<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //指定表名
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];

    // 获取首页幻灯片数据
    public static function getShowData(){
        $res = Goods::select('goods_id','pic')->where('is_show','是')->orderBy('goods_id','desc')->take(4)->get();

        return $res;
    }

 	public static function getJingData(){
        $res3 = Goods::where('is_jing','是')->take(3)->get();

        return $res3;
    }
	public static function getNewData(){
        $res4 =Goods::where('is_new','否')->take(4)->get();

        return $res4;
    }




}
