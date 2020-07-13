<?php


use App\Models\Note;
use Illuminate\Database\Seeder;

class LinksNotesSeeder extends Seeder
{
    public function run()
    {
        $notes = Note::all();
        foreach ($notes as $note) {
            if (rand(1, 5) > 4) {
                continue;
            }
            $count = rand(1, 3);
            $noteCount = $notes->count();
            $usedId = [$note->id];
            for($i = 0; $i < $count; $i++) {
                do {
                    $id = rand(1, $noteCount);
                } while (in_array($id, $usedId));
                array_push($usedId, $id);
                $note->links()->attach($id);
            }
        }
    }
}
