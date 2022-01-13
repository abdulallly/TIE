<?php

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $schools = [
            /*ARUSHA*/
            'Arusha CC' => ["KIGONGONI PRIMARY SCHOOL","KILIMANJARO PRIMARY SCHOOL"],
            'Arusha DC'=>["HIGHRIDGE PRIMARY SCHOOL", "HOPE PRIMARY SCHOOL"],
            'Karatu DC' => ["GEER PRIMARY SCHOOL", "GENDAA PRIMARY SCHOOL"],
            'Longido DC'=> ["KITARINI PRIMARY SCHOOL", "KITENDENI PRIMARY SCHOOL"],
            'Meru DC'=> ["AIMBORA JUNIOR SCHOOL PRIMARY SCHOOL", "AKERI HOPE ENGLISH MEDIUM PRIMARY SCHOOL"],
            'Monduli DC'=>["KILIMATINDE PRIMARY SCHOOL", "KIPOK PRIMARY SCHOOL"],
            'Ngorongoro DC'=>["MAMA SARA PRIMARY SCHOOL", "MARIE CORRENSON PRIMARY SCHOOL"],
            /*DAR ES SALAAM*/
            'Ilala MC' => ["ABC CAPITAL PRIMARY SCHOOL","ACCT PRIMARY SCHOOL"],
            'Kigamboni MC' => ["KIVUKONI PRIMARY SCHOOL","MAHENGE PRIMARY SCHOOL"],
            'Kinondoni MC'=>["FAITH PRIMARY SCHOOL","FEZA PRIMARY SCHOOL"],
            'Temeke MC'=>["KIGONGONI PRIMARY SCHOOL","KILIMANJARO PRIMARY SCHOOL"],
            'Ubungo MC'=>["ALI HASSAN MWINYI ISLAMIC PRIMARY SCHOOL","ALLIANCE PRIMARY SCHOOL"],
        ];
        foreach( $schools as $council => $school ) {
            $council = \App\Council::where('name', ucfirst(strtolower($council)))->first();
            foreach($school as $schl){
                \App\School::create([
                    'council_id'  => $council->id,
                    'name'=> ucfirst(strtolower($schl))
                ]);
            }
        }

    }
}
