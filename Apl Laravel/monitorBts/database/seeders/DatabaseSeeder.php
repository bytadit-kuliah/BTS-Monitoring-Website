<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Btstype;
use App\Models\Kecamatan;
use App\Models\Owner;
use App\Models\Village;
use Illuminate\Support\Str;

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
            'firstName' => 'Ucok',
            'lastName' => 'Subejo',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin1'),
            'is_admin' => true,
            'remember_token' =>  Str::random(20)
        ]);

        User::create([
            'username' => 'surveyor1',
            'firstName' => 'Aditya',
            'lastName' => 'Bagus',
            'email' => 'surveyor1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('surveyor1'),
            'is_admin' => false,
            'remember_token' =>  Str::random(20)
        ]);

        User::create([
            'username' => 'surveyor2',
            'firstName' => 'Christopher',
            'lastName' => 'Aaron',
            'email' => 'surveyor2@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('surveyor2'),
            'is_admin' => false,
            'remember_token' =>  Str::random(20)
        ]);

        Btstype::create([
            'type' => 'Kayu'
        ]);
        Btstype::create([
            'type' => 'Besi'
        ]);
        Btstype::create([
            'type' => 'Aluminium'
        ]);

        Owner::create([
            'nama' => 'Indoshit',
            'foto' => '/abc....',
            'alamat' => 'baki',
            'noTelp' => '09998'
        ]);
        Owner::create([
            'nama' => 'Telkomnyet',
            'foto' => '/abc....',
            'alamat' => 'baki',
            'noTelp' => '09998'
        ]);

        Kecamatan::create([
            'nama' => 'Gumpang'
        ]);

        Kecamatan::create([
            'nama' => 'Jebres'
        ]);

        Village::create([
            'nama' => 'SukaMakmur',
            'kecamatan_id' => '1'
        ]);

        Village::create([
            'nama' => 'SukaSukaSayaLah',
            'kecamatan_id' => '2'
        ]);

    }
}
