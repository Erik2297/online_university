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
        for($i = 1; $i < 9; $i++){
            $gender_avatar = $i % 2 == 0 ? 'm' : 'w' ;
            $avatar = 'images/default_avatars/'.$gender_avatar.rand(1,4).'.png';
            Ustudent::insert([
                'name' => 'Անուն '.$i,
                'surname' => 'Ազգանուն '.$i,
                'born' => '1997-08-23 00:00:00',
                'gender' => $i % 2 == 0 ? 'male' : 'female',
                'email' => 'student'.$i.'@gmail.com',
                'password' => bcrypt('11111111'),
                'avatar' => $avatar,
                'email_verified_at' => '2022-01-28 15:54:52',
                'group_id' => 1,
                'role_in_group' => $i == 1 ? 'leader' : 'student',
                'active_status' => 'true',
                'paused' => 'false',
            ]);
        }
        for($i = 9; $i < 17; $i++){
            $gender_avatar = $i % 2 == 0 ? 'm' : 'w' ;
            $avatar = 'images/default_avatars/'.$gender_avatar.rand(1,4).'.png';
            Ustudent::insert([
                'name' => 'Անուն '.$i,
                'surname' => 'Ազգանուն '.$i,
                'born' => '1997-08-23 00:00:00',
                'gender' => $i % 2 == 0 ? 'male' : 'female',
                'email' => 'student'.$i.'@gmail.com',
                'password' => bcrypt('11111111'),
                'avatar' => $avatar,
                'email_verified_at' => '2022-01-28 15:54:52',
                'group_id' => 2,
                'role_in_group' => $i == 9 ? 'leader' : 'student',
                'active_status' => 'true',
                'paused' => 'false',
            ]);
        }
    }
}
