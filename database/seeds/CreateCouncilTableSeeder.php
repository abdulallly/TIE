<?php

use Illuminate\Database\Seeder;

class CreateCouncilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $arsh= [
            ['name' => 'Arusha CC', 'code' =>  40101],
            ['name'=>  'Arusha DC',  'code'=>  40103],
            ['name' => 'Karatu DC', 'code' =>  40102],
            ['name'=>  'Longido DC',  'code'=>  40104],
            ['name'=>   'Meru DC',    'code'=>  40105],
            ['name'=>   'Monduli DC', 'code'=>  40106],
            ['name'=>   'Ngorongoro DC','code'=> 40107],
        ];
        $dr= [
            ['name' => 'Ilala MC', 'code' =>  40201],
            ['name' => 'Kigamboni MC','code'=>40202],
            ['name' => 'Kinondoni MC','code'=>40204],
            ['name' =>  'Temeke MC', 'code'=> 40203],
            ['name'=>   'Ubungo MC',  'code'=>40205]
        ];
        $arusha = \App\Region::where('name', 'ARUSHA')->first();
        foreach($arsh as $arshs) {
            \App\Council::create([
                'region_id' => $arusha->id,
                'name' => $arshs['name'],
                'code' => $arshs['code']
            ]);
        }
        $dar = \App\Region::where('name', 'DAR ES SALAAM')->first();
        foreach($dr as $drs) {
            \App\Council::create([
                'region_id' => $dar->id,
                'name' => $drs['name'],
                'code' => $drs['code']
            ]);
        }
    }
}
