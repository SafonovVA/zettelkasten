<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Link model
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $url
 * @property int $note_id
 * @property string $created_at
 * @property string $updated_at
 */
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
