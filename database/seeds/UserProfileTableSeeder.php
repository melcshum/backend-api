<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function ($u) {
            $u->profile()
                ->save(
                    factory(App\Profile::class)
                        ->make(['name' =>   Str::slug($u->name, '.')])
                )->game_sessions()->saveMany(
                    factory(App\GameSession::class, 10)
                        ->make()
                );
        });
    }
}
