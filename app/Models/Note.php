<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Note model
 * @package App\Models
 * @property int $id
 * @property string $parent_number
 * @property int $self_number
 * @property string $common_number
 * @property string $title
 * @property string $content
 * @property int $parent_id
 * @property boolean $has_child
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 */
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

    public function saveNumber(?string $parent_number, int $self_number): void
    {
        $delimiter = $parent_number === null ? '' : '.';
        $this->update([
            'parent_number' => $parent_number,
            'self_number' => $self_number,
            'common_number' => $parent_number . $delimiter . strval($self_number)
        ]);
    }
}
