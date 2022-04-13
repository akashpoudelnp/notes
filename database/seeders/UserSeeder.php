<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role =  Role::create(['name'=>'super_admin']);
      $permission1 = Permission::create(['name'=>'can_dashboard']);   
      $permission2 = Permission::create(['name'=>'can_assign_roleperm']);
      $permission3 = Permission::create(['name'=>'can_crud_permissions']);
      $permission4 = Permission::create(['name'=>'can_crud_roles']);   
      $permission5 = Permission::create(['name'=>'can_crud_users']);
            $role->givePermissionTo($permission1);
            $role->givePermissionTo($permission2);
            $role->givePermissionTo($permission3);
            $role->givePermissionTo($permission4);
            $role->givePermissionTo($permission5);
       $user= User::create(
           [
               "name"=>'Admin',
               "email"=>'admin@admin.com',
               "password"=>bcrypt('password'),
           ]
       );
       $user->assignRole($role);
    }
}
