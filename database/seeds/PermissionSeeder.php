<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
//            'role-list',
//            'role-create',
//            'role-edit',
//            'role-delete',
//            'company-list',
//            'company-create',
//            'company-edit',
//            'company-delete',
//            'employer-list',
//            'employer-create',
//            'employer-edit',
//            'employer-delete',
//            'user-list',
//            'user-create',
//            'user-edit',
//            'user-delete',
//            'industry-list',
//            'industry-create',
//            'industry-edit',
//            'industry-delete',
//            'change-settings',
//            'testimonial-list',
//            'testimonial-create',
//            'testimonial-edit',
//            'testimonial-delete',
//            'blog-list',
//            'blog-create',
//            'blog-edit',
//            'blog-delete',
//            'admin-dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
