<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            ['name' => 'Nhạc Trẻ'],            
            ['name' => 'Nhạc Trữ Tình'],            
            ['name' => 'Dance Việt'],            
            ['name' => 'Rap/Hip Hop Việt'],            
            ['name' => 'Nhạc Trịnh'],            
            ['name' => 'Pop'],    
            ['name' => 'Rock'],        
            ['name' => 'Hàn Quốc'],          
            ['name' => 'Nhật Bản'],
            ['name' => 'Thái Lan'],
        ));
    }
}
