<?php

namespace Database\Seeders;

use App\Models\Ufaculty;
use App\Models\Ugroup;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ugroup::insert([
            'name' => 'Կ-82',
            'faculty_id' => Ufaculty::first('id')->id,
        ]);
        Ugroup::insert([
            'name' => 'Կ-83',
            'faculty_id' => Ufaculty::first('id')->id,
        ]);
    }
}
