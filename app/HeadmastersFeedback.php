<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadmastersFeedback extends Model{


    public $table = 'headmastersfeedbacks';
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

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function headmaster(){
        return $this->belongsTo(User::class,'headmaster_id');
    }
}
