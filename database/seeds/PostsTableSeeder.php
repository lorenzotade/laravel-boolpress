<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            $new_post = new Post();
            $new_post->title = 'Bel titolo, sì sì ' . ($i + 1);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->description = ($i + 1) . ' Un testo lunghissimo, un testo lunghissimo, un testo lunghissimo, un testo lunghissimo, un testo lunghissimo, un testo lunghissimo, un testo lunghissimo, MANNAGGIA LA MISERIAAA';
            $new_post->save();
        }
    }
}
