<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atype extends Model
{
     //指定表名
    protected $table = 'atype';
    protected $primaryKey = 'tid';
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
