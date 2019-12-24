<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $role = \Spatie\Permission\Models\Role::create(['name' => 'Super Admin']);
//        $permissions = \Spatie\Permission\Models\Permission::pluck('id','id')->all();
//        $role->syncPermissions($permissions);
        $user = \App\User::find(1);
        $user->assignRole([1]);
    }
}
