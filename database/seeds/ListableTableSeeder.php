<?php

use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Artist;

class ListableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('listables')->insert(array(
            [
                'song_id' => 1,
                'listable_id' => 1,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 2,
                'listable_id' => 1,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 3,
                'listable_id' => 1,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 3,
                'listable_id' => 2,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 5,
                'listable_id' => 2,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 4,
                'listable_id' => 3,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 4,
                'listable_id' => 5,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 1,
                'listable_id' => 5,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 6,
                'listable_id' => 5,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 7,
                'listable_id' => 5,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 8,
                'listable_id' => 5,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 9,
                'listable_id' => 2,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 9,
                'listable_id' => 4,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 10,
                'listable_id' => 4,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 11,
                'listable_id' => 4,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 12,
                'listable_id' => 3,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 13,
                'listable_id' => 2,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 14,
                'listable_id' => 5,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 15,
                'listable_id' => 1,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 15,
                'listable_id' => 2,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 16,
                'listable_id' => 1,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 17,
                'listable_id' => 2,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 15,
                'listable_id' => 4,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 18,
                'listable_id' => 2,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 19,
                'listable_id' => 2,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 20,
                'listable_id' => 4,
                'listable_type' => Album::class
            ],
            [
                'song_id' => 1,
                'listable_id' => 1,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 2,
                'listable_id' => 2,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 3,
                'listable_id' => 3,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 4,
                'listable_id' => 4,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 5,
                'listable_id' => 2,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 6,
                'listable_id' => 3,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 7,
                'listable_id' => 5,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 8,
                'listable_id' => 6,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 11,
                'listable_id' => 1,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 8,
                'listable_id' => 5,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 9,
                'listable_id' => 6,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 9,
                'listable_id' => 4,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 10,
                'listable_id' => 7,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 11,
                'listable_id' => 7,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 12,
                'listable_id' => 3,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 13,
                'listable_id' => 2,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 14,
                'listable_id' => 6,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 15,
                'listable_id' => 1,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 15,
                'listable_id' => 5,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 16,
                'listable_id' => 1,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 17,
                'listable_id' => 2,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 15,
                'listable_id' => 7,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 18,
                'listable_id' => 7,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 19,
                'listable_id' => 8,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 20,
                'listable_id' => 4,
                'listable_type' => Artist::class
            ],
            [
                'song_id' => 19,
                'listable_id' => 6,
                'listable_type' => Artist::class
            ],
            
        ));
    }
}
