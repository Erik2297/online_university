<?php

namespace Database\Seeders;

use App\Models\Usubject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 65; $i++){
            $credit = rand(1,6);
            Usubject::insert([
                'name' => 'Առարկա '.$i,
                'credits' => $credit,
            ]);
        }
    }
}
