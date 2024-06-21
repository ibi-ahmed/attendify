<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Face;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();

         User::all()->each(function ($user) {
             Face::factory()->create([
                 'user_id' => $user->id,
             ]);
             Attendance::factory(5)->create([
                 'user_id' => $user->id,
             ]);
         });
    }
}
