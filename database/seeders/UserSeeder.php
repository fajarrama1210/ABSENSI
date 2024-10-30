<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     // Buat role admin dan user jika belum ada
    //     if (!Role::where('name', 'admin')->exists()) {
    //         Role::create(['name' => 'admin']);
    //     }
    //     if (!Role::where('name', 'user')->exists()) {
    //         Role::create(['name' => 'user']);
    //     }

    //     // Buat user admin jika belum ada
    //     if (!User::where('email', 'admin@gmail.com')->exists()) {
    //         $admin = User::create([
    //             'name' => 'admin',
    //             'email' => 'admin@gmail.com',
    //             'password' => bcrypt('password'),
    //         ]);
    //         $admin->assignRole('admin');
    //     }

    //     // Buat user biasa jika belum ada
    //     if (!User::where('email', 'user@gmail.com')->exists()) {
    //         $user = User::create([
    //             'name' => 'user',
    //             'email' => 'user@gmail.com',
    //             'nisn' => '1234567899',
    //             'password' => bcrypt('password'),
    //         ]);
    //         $user->assignRole('user');
    //     }
    // }
}
