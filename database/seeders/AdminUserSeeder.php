<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => 'power@123',
                'remember_token' => \Str::random(10),
                'email_verified_at' => now(),
            ]
        ];

        foreach ($admins as $admin) {
            $admin['password'] = \Hash::make($password = $admin['password']);

            $user = User::firstOrCreate([
                'email' => $admin['email'],
            ], $admin);

            // Sync/attach roles here
            // $user

            dump(
                \sprintf(
                    'User: %s |Password: %s',
                    $admin['name'],
                    $password
                ),
            );
        }
    }
}
