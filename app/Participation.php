<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $fillable = ['user_id','package_id','confirm'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Package(){
        return $this->belongsTo(Package::class);
    }
}