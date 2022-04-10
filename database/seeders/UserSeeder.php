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
       $permission = Permission::create(['name'=>'can_dashboard']);
       $permission->assignRole($role);
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
