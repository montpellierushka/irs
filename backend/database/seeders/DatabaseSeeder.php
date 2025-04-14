<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'irsib',
            'email' => 'support@irsib.pro',
            'password' => '$2y$10$AL9hlwRgHkXeYsZ/QktkUuVKKExxpVp8q/ISzRfvRO/JLYxHYzSyq',  //FGT04bvN
        ]);
        $this->call([ 
            CategorySeeder::class, 
            PostSeeder::class, 
            PageSeeder::class, 
            MenuSeeder::class, 
            FrontSeeder::class, 
            TeamSeeder::class, 
            VacancySeeder::class, 
        ]);
    }
}
