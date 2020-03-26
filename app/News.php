<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     //指定表名
    protected $table = 'News';
    protected $primaryKey = 'nid';
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
