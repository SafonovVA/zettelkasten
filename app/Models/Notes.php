<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    public function links()
    {
        return $this->belongsToMany('App\Models\Links');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tags');
    }
}
