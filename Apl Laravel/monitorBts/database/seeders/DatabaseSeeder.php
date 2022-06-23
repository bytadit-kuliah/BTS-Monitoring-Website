<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Btstype;
use App\Models\Kecamatan;
use App\Models\Owner;
use App\Models\Provider;
use App\Models\Village;
use App\Models\Offeredanswer;
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

        // Seeder For Creating User
        User::create([
            'username' => 'admin1',
            'firstName' => 'Ucok',
            'lastName' => 'Subejo',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'noTelp' => '085749383186',
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
            'noTelp' => '088749383186',
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
            'noTelp' => '083749383186',
            'password' => bcrypt('surveyor2'),
            'is_admin' => false,
            'remember_token' =>  Str::random(20)
        ]);

        // Seedr For BTS Types
        Btstype::create([
            'type' => 'Rooftop'
        ]);
        Btstype::create([
            'type' => 'Greenfield'
        ]);

        // Seeder For Owners
        Owner::create([
            'nama' => 'Indosat',
            'foto' => '/abc',
            'alamat' => 'Jl. Medan Merdeka Barat No. 21, Jakarta Pusat',
            'noTelp' => '021-30003001'
        ]);
        Owner::create([
            'nama' => 'Telkomsel',
            'foto' => '/abc',
            'alamat' => 'Jl. Jendral Gatot Subroto, Jakarta Selatan',
            'noTelp' => '080-71811811 '
        ]);
        Owner::create([
            'nama' => 'XL Axiata',
            'foto' => '/abc',
            'alamat' => 'Jl. H.R. Rasuna Said X5 Kav. 11-12, Jakarta Selatan',
            'noTelp' => '021-57959817'
        ]);
        Owner::create([
            'nama' => 'Bakrie Telcom',
            'foto' => '/abc',
            'alamat' => 'Jl. H.R Rasuna Said Kav. B-1, Jakarta',
            'noTelp' => '021-91101112'
        ]);

        // Seeder For Providers
        Provider::create([
            'nama' => 'Indosat',
            'foto' => '/abc',
            'alamat' => 'Jl. Medan Merdeka Barat No. 21, Jakarta Pusat',
            'noTelp' => '021-30003001'
        ]);
        Provider::create([
            'nama' => 'Telkomsel',
            'foto' => '/abc',
            'alamat' => 'Jl. Jendral Gatot Subroto, Jakarta Selatan',
            'noTelp' => '080-71811811 '
        ]);
        Provider::create([
            'nama' => 'XL Axiata',
            'foto' => '/abc',
            'alamat' => 'Jl. H.R. Rasuna Said X5 Kav. 11-12, Jakarta Selatan',
            'noTelp' => '021-57959817'
        ]);
        Provider::create([
            'nama' => 'Bakrie Telcom',
            'foto' => '/abc',
            'alamat' => 'Jl. H.R Rasuna Said Kav. B-1, Jakarta',
            'noTelp' => '021-91101112'
        ]);

        // Seeder For Kecamatan di Kota Surakarta
        Kecamatan::create([
            'nama' => 'Banjarsari'
        ]);
        Kecamatan::create([
            'nama' => 'Jebres'
        ]);
        Kecamatan::create([
            'nama' => 'Laweyan'
        ]);
        Kecamatan::create([
            'nama' => 'Pasar Kliwon'
        ]);
        Kecamatan::create([
            'nama' => 'Serengan'
        ]);

        // Seeder Kelurahan for Kecamatan Banjarsari
        Village::create([
            'nama' => 'Kadipiro',
            'kecamatan_id' => '1'
        ]);
        Village::create([
            'nama' => 'Sumber',
            'kecamatan_id' => '1'
        ]);
        Village::create([
            'nama' => 'Manahan',
            'kecamatan_id' => '1'
        ]);
        Village::create([
            'nama' => 'Gilingan',
            'kecamatan_id' => '1'
        ]);
        // Seeder Kelurahan for Kecamatan Jebres
        Village::create([
            'nama' => 'Jebres',
            'kecamatan_id' => '2'
        ]);
        Village::create([
            'nama' => 'Jagalan',
            'kecamatan_id' => '2'
        ]);
        Village::create([
            'nama' => 'Mojosongo',
            'kecamatan_id' => '2'
        ]);
        Village::create([
            'nama' => 'Sewu',
            'kecamatan_id' => '2'
        ]);
        // Seeder Kelurahan for Kecamatan Laweyan
        Village::create([
            'nama' => 'Penumping',
            'kecamatan_id' => '3'
        ]);
        Village::create([
            'nama' => 'Purwosari',
            'kecamatan_id' => '3'
        ]);
        Village::create([
            'nama' => 'Jajar',
            'kecamatan_id' => '3'
        ]);
        Village::create([
            'nama' => 'Karangasem',
            'kecamatan_id' => '3'
        ]);
        // Seeder Kelurahan for Kecamatan Pasar Kliwon
        Village::create([
            'nama' => 'Semanggi',
            'kecamatan_id' => '4'
        ]);
        Village::create([
            'nama' => 'Pasar Kliwon',
            'kecamatan_id' => '4'
        ]);
        Village::create([
            'nama' => 'Danukusuman',
            'kecamatan_id' => '4'
        ]);
        Village::create([
            'nama' => 'Gajahan',
            'kecamatan_id' => '4'
        ]);
        // Seeder Kelurahan for Kecamatan Serengan
        Village::create([
            'nama' => 'Kratonan',
            'kecamatan_id' => '5'
        ]);
        Village::create([
            'nama' => 'Serengan',
            'kecamatan_id' => '5'
        ]);
        Village::create([
            'nama' => 'Joyontakan',
            'kecamatan_id' => '5'
        ]);
        Village::create([
            'nama' => 'Kemlayan',
            'kecamatan_id' => '5'
        ]);
        // Offeredanswer Seeds
        Offeredanswer::create([
            'isi' => 'Sangat Baik'
        ]);
        Offeredanswer::create([
            'isi' => 'Baik'
        ]);
        Offeredanswer::create([
            'isi' => 'Cukup'
        ]);
        Offeredanswer::create([
            'isi' => 'Buruk'
        ]);
        Offeredanswer::create([
            'isi' => 'Sangat Buruk'
        ]);


    }
}
