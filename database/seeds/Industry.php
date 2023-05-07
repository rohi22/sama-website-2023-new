<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Industry extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industry')->insert([
            'title' => "Machines",
            'url' => '',
            'image' => 'machines.png',
        ]);
        DB::table('industry')->insert([
            'title' => "Processing Line",
            'url' => '',
            'image' => 'processing-lines.png',
        ]);
        DB::table('industry')->insert([
            'title' => "Bakery Series",
            'url' => '',
            'image' => 'bakery.png',
        ]);
        DB::table('industry')->insert([
            'title' => "Pharmaceutical",
            'url' => '',
            'image' => 'pharmaceutical.png',
        ]);
        DB::table('industry')->insert([
            'title' => "Snack Processing",
            'url' => '',
            'image' => 'snack.png',
        ]);
        DB::table('industry')->insert([
            'title' => "Accessories",
            'url' => '',
            'image' => 'accessories.png',
        ]);
    }
}
