<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\page;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();

        for ($i=0; $i < 10; $i++) {
            Page::create([
                'title'   => 'Title '.$i,
                'slug'    => 'first-page',
                'user_id' => 1,
            ]);
        }
    }
}
