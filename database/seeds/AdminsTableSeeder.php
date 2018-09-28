<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Admin\Admin::truncate();

        \App\Model\Admin\Admin::create([
            'name'     => 'Javier Gomez',
            'email'    => 'javiergomezve@gmail.com',
            'password' => bcrypt('javiergomezve'),
            'status'   => 1,
            'phone'    => '1',
        ]);

        \App\Model\Admin\Admin::create([
            'name'     => 'Alexander Melean',
            'email'    => 'alexandermeleanve@gmail.com',
            'password' => bcrypt('alexandermeleanve'),
            'status'   => 1,
            'phone'    => '1',
        ]);

        \App\Model\Admin\AdminRole::truncate();

        \App\Model\Admin\AdminRole::insert([
            ['admin_id' => 1, 'role_id' => 1],
            ['admin_id' => 1, 'role_id' => 2],
            ['admin_id' => 2, 'role_id' => 2],
        ]);
    }
}
