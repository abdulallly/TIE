<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectManagersFeedback extends Model{


    public $table = 'projectmanagersfeedbacks';
    protected $fillable = [''];

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
