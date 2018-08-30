<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'website', 'logo', 'password'];

    protected $hidden = ['password', 'deleted_at', 'updated_at'];

    protected $dates = ['deleted_at'];

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}
