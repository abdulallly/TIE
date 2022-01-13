<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Council extends Model{
    protected $fillable = [
        'name','code'
    ];
    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function schools(){
        return $this->hasMany(School::class);
    }

    public function headmastersfeedbacks(){
        return $this->hasMany(HeadmastersFeedback::class,'council_id');
    }

    public function projectmanagersfeedback(){
        return $this->hasMany(ProjectManagersFeedback::class);
    }

    public function statisticalofficersfeedback(){
        return $this->hasMany(StatisticalOfficersFeedback::class);
    }
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }


    public function invoicereferences(){
        return $this->hasMany(Invoice::class);
    }


}
