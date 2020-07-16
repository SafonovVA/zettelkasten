<?php

use App\Models\Link;
use App\Models\Note;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class); //Add test user for authentication
        echo "User factory started\n";
        factory(User::class, 2)->create(); //Add other 2 users
        echo "User factory ended\n";

        echo "Note factory started\n";
        factory(Note::class, 500)->create(); //Add notes
        echo "Note factory ended\n";
        $this->call(NotesParentSeeder::class); //Add parent_id to notes
        $this->call(NotesNumberSeeder::class); //Add parent_id to notes
        $this->call(LinksSeeder::class); //Add links for notes
        echo "Link factory started\n";
        factory(Link::class, 300)->create(); //Add other links
        echo "Link factory ended\n";
        $this->call(LinksNotesSeeder::class); // Fill Link-Note
        echo "Tag factory started\n";
        factory(Tag::class, 300)->create(); //Add tags
        echo "Tag factory ended\n";
        $this->call(NoteTagSeeder::class); // FIll Note-Tag

        //$this->call(NotesSeeder::class);
    }
}
