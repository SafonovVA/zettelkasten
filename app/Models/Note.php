<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function links()
    {
        return $this->belongsToMany('App\Models\Link')->withTimestamps();
    }

    public function link()
    {
        return $this->hasOne('App\Models\Link');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }
}
