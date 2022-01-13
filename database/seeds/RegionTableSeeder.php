<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $regions = [
            ['name' => 'ARUSHA'],
            ['name' => 'DAR ES SALAAM'],
        ];
        foreach($regions as $region) {
            \App\Region::create([
                'name' => $region['name'],
            ]);
        }
    }
}
