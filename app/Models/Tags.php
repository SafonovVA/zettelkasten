<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function notes()
    {
        return $this->belongsToMany('App\Models\Notes');
    }
}
