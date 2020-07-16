<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Tag model
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Tag extends Model
{
    public function notes()
    {
        return $this->belongsToMany('App\Models\Note')->withTimestamps();
    }
}
