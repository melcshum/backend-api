<?php

use Illuminate\Database\Seeder;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create()->each(function ($u) {
            $u->profile()
                ->save(
                    factory(App\Profile::class)->make()
                ) ;
        });
    }
}
