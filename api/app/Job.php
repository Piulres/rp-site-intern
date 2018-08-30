<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'description', 'local', 'remote', 'type', 'company_id'];

    protected $hidden = ['deleted_at', 'updated_at'];

    protected $dates = ['deleted_at'];

    function company() {
        return $this->belongsTo('App\Company');
    }
}