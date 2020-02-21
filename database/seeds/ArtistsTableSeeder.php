<?php

use Illuminate\Database\Seeder;
use App\Models\Artist;
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
        factory(Artist::class, 10)->create();
    }
}
