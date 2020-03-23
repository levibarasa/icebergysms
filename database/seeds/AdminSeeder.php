<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Levi',
            'email' => 'lvbarasa@gmail.com',
            'institutionid' => '1',
            'password' => bcrypt('Levi'),
            'role' => 'administrator'
        ]);
    }
}
