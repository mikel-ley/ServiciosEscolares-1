<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            
            'name' => 'Gomez Alberth',
            'matricula' => '18462109',
            'carrera' => 'Gestion y Desarrollo de Software',
            'email' => 'GomezAlbertOlivares@gmail.com',
            'password' => bcrypt('S1S73MK1R435859UM4')
        ])->assignRole('Admin');

        User::factory(10)->create();

    }
}
