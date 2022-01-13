<?php

use Illuminate\Database\Seeder;

class StandardSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $standards = [
            ['name' => 'Standard I'],
            ['name' => 'Standard II'],
            ['name' => 'Standard III'],
            ['name' => 'Standard IV'],
            ['name' => 'Standard V'],
        ];
        foreach($standards as $standard) {
            \App\Standard::updateOrCreate([
                'name' => $standard['name'],
            ]);
        }
    }
}
