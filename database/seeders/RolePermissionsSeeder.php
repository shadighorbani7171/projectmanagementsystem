<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {     


       
            // ایجاد دسترسی‌ها
            Permission::updateOrCreate(['name' => 'view dashboard', 'guard_name' => 'web']);
            Permission::updateOrCreate(['name' => 'access admin pannel', 'guard_name' => 'web']);

            // ایجاد نقش‌ها
            $adminRole = Role::updateOrCreate(['name' => 'admin', 'guard_name' => 'web']);
            $teamLeaderRole = Role::updateOrCreate(['name' => 'team_leader', 'guard_name' => 'web']);
            $userRole = Role::updateOrCreate(['name' => 'user', 'guard_name' => 'web']);

            // تخصیص دسترسی‌ها به نقش‌ها
            $adminRole->syncPermissions(Permission::all());
            $teamLeaderRole->syncPermissions(['view dashboard']);
            $userRole->syncPermissions(['view dashboard']);

            // ایجاد و به‌روزرسانی کاربران و تخصیص نقش‌ها
            $admin = User::updateOrCreate(
                [
                    'email' => 'shadighorbani7171@gmail.com'
                ],
                [
                    'name' => 'Admin Admin',
                    'password' => Hash::make('admin7171_71'), // اطمینان از هش کردن رمز عبور
                ]
            );
            $admin->assignRole($adminRole);

            $teamLeader = User::updateOrCreate(
                [
                    'email' => 'shadighorbani9292@yahoo.com'
                ],
                [
                    'name' => 'Team Leader',
                    'password' => Hash::make('leader9292_92'), // اطمینان از هش کردن رمز عبور
                ]
            );
            $teamLeader->assignRole($teamLeaderRole);

        //     $user = User::updateOrCreate(
        //         [
        //             'email' => 'user@example.com'
        //         ],
        //         [
        //             'name' => 'User User',
        //             'password' => Hash::make('user1234_12'), // اطمینان از هش کردن رمز عبور
        //         ]
        //     );
        //     $user->assignRole($userRole);
        // });
    }
}

    
        


       
    

       

    

