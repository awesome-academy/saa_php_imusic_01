<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert(array(
            [
                'name' => 'Sơn Tùng MTP',
                'dob' => '1996-07-13',
                'avatar' => 'sontung.jpg',
                'infomation' => 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'
            ],            
            [
                'name' => 'Chi Dân',
                'dob' => '1990-1-20',
                'avatar' => 'chidan.jpg',
                'infomation' => 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'
            ],            
            [
                'name' => 'Noo Phước Thịnh',
                'dob' => '1987-3-12',
                'avatar' => 'chidan.jpg',
                'infomation' => 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'
            ],            
            [
                'name' => 'Mỹ Tâm',
                'dob' => '1987-7-8',
                'avatar' => 'mytam.jpg',
                'infomation' => 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'
            ],
            [
                'name' => 'Trịnh Thăng Bình',
                'dob' => '1991-6-5',
                'avatar' => 'trinhthangbinh.jpg',
                'infomation' => 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'
            ],
            [
                'name' => 'Justin Beiber',
                'dob' => '2000-5-5',
                'avatar' => 'justinbb.jpg',
                'infomation' => 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'
            ],
            [
                'name' => 'Adele',
                'dob' => '1970-6-30',
                'avatar' => 'v1.jpg',
                'infomation' => 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'
            ],
            [
                'name' => 'G-Dragon',
                'dob' => '1990-6-30',
                'avatar' => 'gdragon.jpg',
                'infomation' => 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'
            ],
            [
                'name' => 'PSY',
                'dob' => '1970-6-10',
                'avatar' => 'psy.jpg',
                'infomation' => 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'
            ],
        ));

    }
}
