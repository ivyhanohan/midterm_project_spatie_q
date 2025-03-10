<?php


namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check and create roles if they don’t exist
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $dataEntry = Role::firstOrCreate(['name' => 'data_entry']);

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

        // Call other seeders
        $this->call(TodoListSeeder::class);
    }
}
