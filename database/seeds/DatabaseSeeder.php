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

        $this->call(PrefabsTableSeeder::class);

        $this->call(ScenariosTableSeeder::class);
        $this->call(KnowledgeComponentsTableSeeder::class);
    }
}
