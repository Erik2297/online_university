<?php

namespace Database\Seeders;

use App\Models\Ufaculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ufaculty::insert([
            'name' => 'Ինֆորմատիկա',
        ]);
    }
}
