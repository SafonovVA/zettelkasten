<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function notes()
    {
        return $this->belongsToMany('App\Models\Note')->withTimestamps();
    }

    public function note()
    {
        return $this->hasOne('App\Models\Note');
    }
}
