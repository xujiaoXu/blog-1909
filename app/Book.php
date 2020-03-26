<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // 指定表名
    protected $table = 'book';
    protected $primaryKey = 'bid';
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
