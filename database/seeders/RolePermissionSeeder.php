<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Major;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level = Level::firstOrCreate(['kelas' => '12']);
        $major = Major::firstOrCreate(['major' => 'RPL1']);
        //membuat Peran
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        //membuat izin
        $permissions = [
            'add class',
            'edit class',
            'delete class',
            'add major',
            'edit major',
            'delete major',
            'user confirmation',
            'see user',
            'delete user',
            'see absences',
            'confirm permission',
            'download permission',
            'user absence',
            'user permission'
        ];

        foreach ($permissions as $permission){
            Permission::firstOrCreate(['name' => $permission]);
        }

        $adminRole->givePermissionTo(['add class', 'edit class', 'delete class', 'add major', 'delete major', 'user confirmation', 'see user', 'delete user', 'see absences', 'confirm permission', 'download permission']);

        $userRole->givePermissionTo(['user absence', 'user permission']);

        $adminUser = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('asdasd'),
                'level_id' => null,
                'major_id' => null,
                'status' => 'active'
            ]
        );
        $adminUser->assignRole($adminRole->name);

        $normalUser = User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'user',
                'password' => Hash::make('asdasd'),
                'level_id' => $level->id,
                'major_id' => $major->id,
                'status' => 'active',
            ]
        );
        $normalUser->assignRole('user');
    }
}
