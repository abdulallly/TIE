<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class School extends Model{
    public function users(){
        return $this->hasMany(User::class);
    }
    public function standards(){
        return $this->hasMany(Standard::class);
    }
    public function council(){
        return $this->belongsTo(Council::class);
    }
    public function schoolinfos(){
        return $this->hasMany(School_information::class);
    }

    public function headmastersfeedbacks(){
        return $this->hasMany(HeadmastersFeedback::class);
    }

    public function projectmanagersfeedback(){
        return $this->hasMany(ProjectManagersFeedback::class);
    }


}
