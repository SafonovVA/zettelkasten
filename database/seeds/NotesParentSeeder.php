<?php


use App\Models\Note;
use Illuminate\Database\Seeder;

class NotesParentSeeder extends Seeder
{
    public function run()
    {
        $count = Note::all()->count();
        for ($i = 1; $i <= $count; $i++) {
            $parent_id = rand(0, 5) > 0 ? rand(1, 500) : null;
            Note::where('id', $i)->update(['parent_id' => $parent_id]);
        }
    }
}
