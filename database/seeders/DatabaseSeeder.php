<?php

namespace Database\Seeders;

use App\Models\Role;
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

        $user = User::create([
            'name' => 'User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $user->posts()->create([
            'title' => 'title1',
            'slug' => 'slug1',
            'excerpt' => 'excerpt1',
            'body' => 'body1',
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
