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
        $faker = Faker\Factory::create();

        $id_songs = DB::table('songs')->pluck('id');
        $id_artists = DB::table('artists')->pluck('id');

        foreach($id_songs as $song_id){
            DB::table('listables')->insert([
                'song_id' =>  $song_id,
                'listable_id' => $faker->randomElement($id_artists),
                'listable_type' => Artist::class,
            ]);
        }

        $id_albums = DB::table('albums')->pluck('id');
        foreach($id_songs as $song_id){
            DB::table('listables')->insert([
                'song_id' => $song_id,
                'listable_id' => $faker->randomElement($id_albums),
                'listable_type' => Album::class,
            ]);
        }
    }
}
