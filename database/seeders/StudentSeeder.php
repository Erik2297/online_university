<?php

namespace Database\Seeders;

use App\Models\Ugroup;
use App\Models\Ustudent;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ustudent::insert([
            'name' => 'test',
            'surname' => 'test',
            'born' => '1997-08-23 00:00:00',
            'gender' => 'male',
            'email' => 'gever2297@gmail.com',
            'password' => bcrypt('11111111'),
            'avatar' => 'images/default_avatarsm3.png',
            'email_verified_at' => '2022-01-28 15:54:52',
            'group_id' => Ugroup::first('id')->id,
            'role_in_group' => 'student',
            'active_status' => 'true',
            'paused' => 'false',
        ]);
    }
}
