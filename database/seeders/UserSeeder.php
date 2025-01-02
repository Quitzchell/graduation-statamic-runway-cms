<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Mitchell Quitz',
                'email' => 'mitchell@allesonline.nl',
                'password' => Hash::make(config('services.admin')),
                'super' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Test account',
                'email' => 'test@allesonline.nl',
                'password' => Hash::make(config('services.admin')),
                'super' => 1,
                'email_verified_at' => now(),
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
