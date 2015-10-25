<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolModel extends Model
{
    //绑定数据表
    protected $table = 'schoolbean';
    
    //指定主键，方便后面更新等操作
    public $primaryKey = 'schoolname';
    
    public $timestamps = false;
}
