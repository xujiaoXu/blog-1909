<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'Type';
    protected $primaryKey = 'tid';
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
