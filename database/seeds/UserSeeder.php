<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan pengguna pertama
        User::create([
            'nama'              => 'Admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('asdqwe123'),
        ]);

        // Tambahkan pengguna kedua
        User::create([
            'nama'              => 'Lurah',
            'email'             => 'lurah@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('plurah'),
        ]);
    }
}
