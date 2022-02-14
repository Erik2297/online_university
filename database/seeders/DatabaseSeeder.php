<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('db:seed --class=FacultySeeder');
        Artisan::call('db:seed --class=GroupSeeder');
        Artisan::call('db:seed --class=StudentSeeder');
    }
}
