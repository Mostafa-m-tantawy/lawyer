<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeding extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Demo lawyer',
            'Email' => 'demo@lawyer.com',
            'password' => Hash::make('123456'),
             'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()
        ]);    }
}
