<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artist = Artist::factory();
        Album::factory()
            ->count(7)
            ->forArtist([
                'name' => 'cum'
                        ])
            ->create();
    }
}
