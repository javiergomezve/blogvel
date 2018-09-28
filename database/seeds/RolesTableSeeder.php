<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Admin\Role::truncate();

        \App\Model\Admin\Role::create(['name' => 'Admin']);
        \App\Model\Admin\Role::create(['name' => 'Editors']);
        \App\Model\Admin\Role::create(['name' => 'Publisher']);
        \App\Model\Admin\Role::create(['name' => 'Writer']);

        \App\Model\Admin\Permission::truncate();
        \App\Model\Admin\Permission::insert([
            ['name' => 'Post-Create', 'for' => 'post'],
            ['name' => 'Post-Update', 'for' => 'post'],
            ['name' => 'Post-Publish', 'for' => 'post'],
            ['name' => 'User-Create', 'for' => 'user'],
            ['name' => 'User-Update', 'for' => 'user'],
            ['name' => 'User-Delete', 'for' => 'user'],
            ['name' => 'Tag-CRUD', 'for' => 'other'],
            ['name' => 'Category-CRUD', 'for' => 'other'],
        ]);

        \DB::table('permission_role')->truncate();
        \DB::table('permission_role')->insert([
            ['role_id' => 1, 'permission_id' => 6],
            ['role_id' => 1, 'permission_id' => 4],
            ['role_id' => 1, 'permission_id' => 12],
            ['role_id' => 1, 'permission_id' => 5],
            ['role_id' => 1, 'permission_id' => 10],
            ['role_id' => 3, 'permission_id' => 6],
            ['role_id' => 3, 'permission_id' => 10],
            ['role_id' => 4, 'permission_id' => 4],
            ['role_id' => 4, 'permission_id' => 5],
            ['role_id' => 4, 'permission_id' => 11],
            ['role_id' => 4, 'permission_id' => 12],
            ['role_id' => 5, 'permission_id' => 4],
            ['role_id' => 5, 'permission_id' => 9],
            ['role_id' => 5, 'permission_id' => 12],
        ]);
    }
}
