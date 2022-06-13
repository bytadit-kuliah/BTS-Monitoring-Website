<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\jenis_bts;
use App\Models\owner;
use App\Models\village;
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

        jenis_bts::create([
            'jenisBTS' => 'Kayu'
        ]);
        jenis_bts::create([
            'jenisBTS' => 'Besi'
        ]);
        jenis_bts::create([
            'jenisBTS' => 'Aluminium'
        ]);

        owner::create([
            'nama' => 'Indoshit',
            'foto' => '/abc....',
            'alamat' => 'baki',
            'no_telp' => '09998'
        ]);
        owner::create([
            'nama' => 'Telkomnyet',
            'foto' => '/abc....',
            'alamat' => 'baki',
            'no_telp' => '09998'
        ]);

        village::create([
            'nama' => 'SukaMakmur',
            'kecamatan_id' => '1'
        ]);

        village::create([
            'nama' => 'SukaSukaSayaLah',
            'kecamatan_id' => '2'
        ]);

    }


}
