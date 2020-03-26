<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    
    //指定表名
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];


    public static function getPidData(){
     $res2 = Cate::where('pid',0)->get();

     return $res2;
    } 

}
