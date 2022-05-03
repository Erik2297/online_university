<?php

namespace Database\Seeders;

use App\Models\Uzachot;
use Illuminate\Database\Seeder;

class ZachotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 16; $i++){
            $student_id = $i;
            for($j = 1; $j < 9; $j++){
                for($k = 1 + ($j - 1) * 8; $k < $j * 8 + 1; $k++){
                    Uzachot::insert([
                        "student_id" => $student_id,
                        "subject_id" => $k,
                        "semester" => $j,
                        "mark" => rand(8,20),
                    ]);
                }
            }
        }
    }
}
