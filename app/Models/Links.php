<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    public function notes()
    {
        return $this->belongsToMany('App\Models\Notes');
    }
}
