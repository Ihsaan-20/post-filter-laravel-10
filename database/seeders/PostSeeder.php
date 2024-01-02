<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $num = 50;
        for($i=0; $i <= $num; $i++)
        {
            Post::create([
                'title' => 'post '.$i,
                'short_description' => 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.'.$i,
                'image' => 'https://dummyimage.com/500x200/000/fff',
                'post_type' => rand(0, 1) === 0 ? 'online' : 'offline',
            ]);
        }
    }
}
