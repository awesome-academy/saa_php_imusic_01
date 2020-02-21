<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(ArtistsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SongsTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(ListableTableSeeder::class);
    }
}
