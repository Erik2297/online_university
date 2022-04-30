<?php

namespace Database\Seeders;

use App\Models\Ulecturer;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++){
            $gender_avatar = $i % 2 == 0 ? 'm' : 'w' ;
            $avatar = 'images/default_avatars/'.$gender_avatar.rand(1,4).'.png';
            Ulecturer::insert([
                'name' => 'Դասախոս '.$i,
                'surname' => 'Ազգանուն '.$i,
                'email' => 'lecturer'.$i.'@gmail.com',
                'password' => bcrypt('11111111'),
                'avatar' => $avatar,
                'email_verified_at' => '2022-01-28 15:54:52',
                'role_in_university' => 'lecturer',
                'science_degree' => 'Doctor',
                'born' => '1975-04-16 00:00:00',
                'gender' => $i % 2 == 0 ? 'male' : 'female',
                'entered_the_university' => '2020'
            ]);
        }

    }
}
