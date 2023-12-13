<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSuperVisor extends Model
{
    protected $fillable = ['user_id','supervisor_id'];
    public function Customer()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Supervisor()
    {
        return $this->belongsTo(User::class,'supervisor_id','id');
    }
}
