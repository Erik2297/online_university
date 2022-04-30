<?php

namespace Database\Seeders;

use App\Models\Unews;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unews::insert([
            'name' => 'test',
            'surname' => 'test',
            'email' => 'gever2297@gmail.com',
            'password' => bcrypt('11111111'),
            'avatar' => 'images/default_avatarsm3.png',
            'email_verified_at' => '2022-01-28 15:54:52',
            'role_in_university' => 'lecturer',
            'science_degree' => 'Doctor',
            'born' => '1975-04-16 00:00:00',
        ]);
    }
}
