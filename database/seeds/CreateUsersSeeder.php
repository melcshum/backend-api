<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'is_admin' => '1',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ],
            // [
            //     'name' => 'User',
            //     'email' => 'user@test.com',
            //     'is_admin' => '0',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        for ($i = 0; $i < 99; $i++) {

            $u = User::create(
                [
                    'name' => 'test' . $i,
                    'email' => 'test' . $i . '@test.com',
                    'is_admin' => 0,
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'email_verified_at' =>now(),
                ]

            );
            $u->profile()->save(
                factory(App\Profile::class)->make(['name' =>   Str::slug($u->name, '.')])
            );
        }
    }
}
