<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
       $user = User::factory()->create([
            'name' => 'Jawad Alhomaidi',
            'email' => 'gawadfaisalalhomaidi@gmail.com',
            'password' => '$2y$12$ZIvvpN7YWru2PKivMLT1sOZFk7aUlucRsYGmoPu1/brELYuLSPOVa',
            'username' => 'JawadAlhomaidi',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $role = Role::create(['name' => 'administrator']);
        $user->assignRole($role);
    //    $user = User::factory()->create([
    //         'name' => 'Jawad Faisal',
    //         'email' => 'editor@erp.com',
    //         'password' => '$2y$12$ZIvvpN7YWru2PKivMLT1sOZFk7aUlucRsYGmoPu1/brELYuLSPOVa',
    //         'username' => 'editor',
    //         'status' => 'active',
    //         'email_verified_at' => now(),
    //     ]);
    //     $role = Role::create(['name' => 'editor']);
    //     $user->assignRole($role);
    }
}
