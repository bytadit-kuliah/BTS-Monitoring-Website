<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'admin1',
            'name' => 'Ucok Subejo',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin1'),
            'is_admin' => true,
            // 'is_surveyor' => false,
            'remember_token' =>  Str::random(20)
        ]);

        User::create([
            'username' => 'surveyor1',
            'name' => 'Amin Pratama',
            'email' => 'surveyor1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('surveyor1'),
            'is_admin' => false,
            // 'is_surveyor' => true,
            'remember_token' =>  Str::random(20)
        ]);

        User::create([
            'username' => 'surveyor2',
            'name' => 'Roy Kimochi',
            'email' => 'surveyor2@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('surveyor2'),
            'is_admin' => false,
            // 'is_surveyor' => true,
            'remember_token' =>  Str::random(20)
        ]);
    }


}
