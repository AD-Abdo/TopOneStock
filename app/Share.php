<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = ['code','name','buy_date','buy_salary','sell_date','sell_salary','no_cookies',
    'status','profit'];
}