<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Admin::updateOrCreate([
            'id' => 1
        ],[
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123456789'),
        ]);

        $role = Role::updateOrCreate(['id' => 1],[
            'name' => 'Super Admin',
            'guard_name' => 'admin'
        ]);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $super_admin->assignRole([$role->id]);
    }
}
