<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        $this->call(RolesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);

        // user
        $this->call(PostsTableSeeder::class);
    }
}
