<?php

namespace Database\Seeders;

use App\Models\UlecturerUsubject;
use Illuminate\Database\Seeder;

class LecturerSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 9; $i++){
            for($j = 1; $j < 9; $j++){
                UlecturerUsubject::insert([
                    'lecturer_id' => $i,
                    'subject_id' => ($j - 1) * 8 + $i,
                ]);
            }
        }
    }
}
