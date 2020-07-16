<?php


use App\Models\Note;
use Illuminate\Database\Seeder;

class NotesParentSeeder extends Seeder
{
    public function run()
    {
        $notes = Note::all();
        $count = $notes->count();
        for ($i = 50; $i < 150; $i++) {
            $parent_id = rand(0, 5) > 0 ? rand(1, 49) : null;
            if ($parent_id === null) {
                continue;
            }
            ($notes[$i])->update(['parent_id' => $parent_id]);
            Note::find($parent_id)->update(['has_child' => true]);
        }
        for ($i = 151; $i < 300; $i++) {
            $parent_id = rand(0, 5) > 0 ? rand(51, 149) : null;
            if ($parent_id === null) {
                continue;
            }
            ($notes[$i])->update(['parent_id' => $parent_id]);
            Note::find($parent_id)->update(['has_child' => true]);
        }
        for ($i = 301; $i < $count; $i++) {
            $parent_id = rand(0, 5) > 0 ? rand(151, 299) : null;
            if ($parent_id === null) {
                continue;
            }
            ($notes[$i])->update(['parent_id' => $parent_id]);
            Note::find($parent_id)->update(['has_child' => true]);
        }

        /*foreach ($notes as $note) {
            $parent_id = rand(0, 5) > 0 ? rand(1, 500) : null;

            if ($parent_id === null) {
                continue;
            }
            $note->update(['parent_id' => $parent_id]);
            Note::find($parent_id)->update(['has_child' => true]);
        }*/
    }
}
