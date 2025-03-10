<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }
      // Create Roles
      $admin = Role::create(['name' => 'admin']);
      $dataEntry = Role::create(['name' => 'data-entry']);

      // Create an Admin User
      $adminUser = User::factory()->create([
          'name' => 'Admin User',
          'email' => 'admin@example.com',
          'password' => bcrypt('password'),
      ]);
      $adminUser->assignRole($admin);

      // Create a Data Entry User
      $dataEntryUser = User::factory()->create([
          'name' => 'Data Entry User',
          'email' => 'user@example.com',
          'password' => bcrypt('password'),
      ]);
      $dataEntryUser->assignRole($dataEntry);
}
}
