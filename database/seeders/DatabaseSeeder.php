<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(
        //     RoleSeeder::class
        // );

        Role::create([
            'name' => 'author',
        ]);

        Role::create([
            'name' => 'user',
        ]);

        Role::create([
            'name' => 'admin',
        ]);

        Category::create([
            'name' => 'Education',
            'slug' => 'education',
        ]);

        Tag::create([
            'name' => 'php',
        ]);

        Tag::create([
            'name' => 'c++',
        ]);

        // ------------------------------------------

        $user1 = User::create([
            'name' => 'User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $user1->image()->create([
            'name' => 'user image',
            'extension' => 'jpg',
            'path' => '/image/user_file.jpg',
        ]);

        $post1 = $user1->posts()->create([
            'title' => 'title1',
            'slug' => 'slug1',
            'excerpt' => 'excerpt1',
            'body' => 'body1',
            'user_id' => 1,
            'category_id' => 1,
        ]);

        $post1->tags()->sync([1, 2]);

        $post1->image()->create([
            'name' => 'post image',
            'extension' => 'jpg',
            'path' => '/image/random_file.jpg',
        ]);

        // ------------------------------------------

        $user2 = User::create([
            'name' => 'User2',
            'email' => 'test2@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 2,
            'remember_token' => Str::random(10),
        ]);

        $user2 = $user2->posts()->create([
            'title' => 'title2',
            'slug' => 'slug2',
            'excerpt' => 'excerpt2',
            'body' => 'body2',
            'user_id' => 2,
            'category_id' => 1,
        ]);

        $user2->tags()->sync([1, 2]);

        // ------------------------------------------

        Comment::create([
            'the_comment' => 'This is a trial comment',
            'post_id' => 1,
            'user_id' => 2,
        ]);

        Comment::create([
            'the_comment' => 'This is a trial 2 comment',
            'post_id' => 2,
            'user_id' => 1,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
