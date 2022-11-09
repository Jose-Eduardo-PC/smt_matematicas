<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crea un super Usuario
        User::create([
            'name' => ' José Eduardo Patiño ',
            'email' => 'jose.eduardo777@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ])->assignRole('SuperAdministrador');
        //crea 50 usuarios
        User::factory()->count(24)->create()->each(function (User $user) {
            $user->assignRole('Usuario');
        });
    }
}
