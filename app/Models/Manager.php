<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Manager extends User
{
    //拒绝访问字段
    protected $guarded = [];
}
