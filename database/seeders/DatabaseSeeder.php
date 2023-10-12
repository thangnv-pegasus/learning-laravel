<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        $user = User::factory()->create([
            'name'=>'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        // tao ngau nhien 
        // $user = User::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // tu tao du lieu trong database
        // $personal = Category::create([
        //     'name'=> 'Personal',
        //     'slug'=>'personal'
        // ]);

        // $family = Category::create([
        //     'name'=> 'Family',
        //     'slug'=>'family'
        // ]);

        // $work = Category::create([
        //     'name'=> 'Work',
        //     'slug'=>'work'
        // ]);


        // Post::create([
        //     'user_id'=> $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'My family post',
        //     'slug' => 'my-first-post',
        //     'excerpt'=>'<p>this is excerpt of My family post </p>',
        //     'body' => '<p> this is body of My family post </p>'
        // ]);

        // Post::create([
        //     'user_id'=> $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'My work post',
        //     'slug' => 'my-second-post',
        //     'excerpt'=>'<p>this is excerpt of My work post </p>',
        //     'body' => '<p> this is body of My work post </p>'
        // ]);


    }
}
