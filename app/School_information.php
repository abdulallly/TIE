<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 */
class School_information extends Model{
    public function school(){
        return $this->belongsTo(School::class);
    }
    public function council(){
        return $this->belongsTo(Council::class);
    }
    public function standard(){
        return $this->belongsTo(Standard::class);
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }
}
