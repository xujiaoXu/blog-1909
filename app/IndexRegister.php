<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexRegister extends Model
{
    //前台注册表
    //指定表名
    protected $table = 'indexregister';
    protected $primaryKey = 'id';
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
