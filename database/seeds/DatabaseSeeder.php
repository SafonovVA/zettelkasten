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
        factory(User::class, 2)->create(); //Add other 2 users
        factory(Note::class, 500)->create(); //Add notes
        $this->call(NotesParentSeeder::class); //Add parent_id to notes
        $this->call(LinksSeeder::class); //Add links for notes
        factory(Link::class, 300)->create(); //Add other links
        $this->call(LinksNotesSeeder::class); // Fill Link-Note
        factory(Tag::class, 300)->create(); //Add tags
        $this->call(NoteTagSeeder::class); // FIll Note-Tag
    }
}
