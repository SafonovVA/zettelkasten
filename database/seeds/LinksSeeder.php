<?php

use App\Models\Note;
use Illuminate\Database\Seeder;

class LinksSeeder extends Seeder
{
    public function run()
    {
        $notes = Note::all();
        foreach ($notes as $note) {
            $note->link()->create([
                'title' => $note->title,
                'note_id' => $note->id,
                'url' => null,
            ]);
        }
    }
}
