<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
     //指定表名
    protected $table = 'article';
    protected $primaryKey = 'aid';
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
