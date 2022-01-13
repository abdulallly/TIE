<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatisticalOfficersFeedback extends Model{


    public $table = 'statisticalsfeedbacks';
    protected $fillable = [''];
//    public function user(){
//        return $this->belongsTo(User::class);
//    }


    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function council(){
        return $this->belongsTo(Council::class);
    }


        public function statisticalofficer(){
        return $this->belongsTo(User::class);
    }



}
