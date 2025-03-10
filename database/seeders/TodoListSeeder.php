<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todo_lists')->insert([
            [
                'title' => 'Buy Groceries',
                'description' => 'Purchase milk, eggs, bread, and vegetables.',
                'due_date' => Carbon::now()->addDays(3)->toDateString(),
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Complete Project Report',
                'description' => 'Finish writing and proofreading the final report.',
                'due_date' => Carbon::now()->addDays(7)->toDateString(),
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Workout Session',
                'description' => 'Go to the gym for an upper body workout.',
                'due_date' => Carbon::now()->addDays(1)->toDateString(),
                'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

