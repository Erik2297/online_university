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
            'name' => 'K-83',
            'faculty_id' => Ufaculty::first('id')->id,
        ]);
    }
}
