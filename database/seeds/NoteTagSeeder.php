<?php


use App\Models\Note;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class NoteTagSeeder extends Seeder
{
    public function run()
    {
        $notes = Note::all();
        foreach ($notes as $note) {
            $count = rand(1, 3);
            $tagCount = Tag::all()->count();
            $usedId = [];
            for($i = 0; $i < $count; $i++) {
                do {
                    $id = rand(1, $tagCount);
                } while (in_array($id, $usedId));
                array_push($usedId, $id);
                $note->tags()->attach($id);
            }
        }
    }
}
