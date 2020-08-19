<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $this->call(CreateUsersSeeder::class);

        $this->call(GameTableSeeder::class);

        $this->call(ScenariosTableSeeder::class);

        $this->call(PrefabsTableSeeder::class);
        $this->call(PrefabScanrioTableSeeder::class);


        $this->call(KnowledgeComponentsTableSeeder::class);

        $this->call(InteractionSeeder::class);

        $this->call(UserProfileTableSeeder::class);


    }
}
