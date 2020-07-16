<?php


use App\Models\Note;
use Illuminate\Database\Seeder;

class NotesNumberSeeder extends Seeder
{
    public function run()
    {
        $notes = Note::all();
        foreach ($notes as $note) {
            $parent_id = $note->parent_id;
            if ($parent_id === null) {
                $maxSelfNumberInParent = Note::where('parent_id', $parent_id)->max('self_number');
                echo $maxSelfNumberInParent . ' max for null' . PHP_EOL;
                if ($maxSelfNumberInParent === null) {
                    $note->saveNumber(null, 1);
                } else {
                    $note->saveNumber(null, strval($maxSelfNumberInParent + 1));
                }
            }
        }

        $repeat = true;
        while ($repeat) {
            $repeat = false;
            foreach ($notes as $note) {
                $parent_id = $note->parent_id;
                if ($parent_id === null || $note->self_number !== null) {
                    continue;
                }
                $parentCommonNumber = Note::find($parent_id)->common_number;
                if ($parentCommonNumber === null) {
                    $repeat = true;
                    continue;
                }

                $maxSelfNumberInParent = Note::where('parent_id', $parent_id)->max('self_number');
                if ($maxSelfNumberInParent === null) {
                    $note->saveNumber($parentCommonNumber, 1);
                } else {
                    $note->saveNumber($parentCommonNumber, $maxSelfNumberInParent + 1);
                }
            }
        }
    }
}
