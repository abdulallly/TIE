<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headmaster extends Model{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function projectmanagersfeedback(){
        return $this->hasMany(ProjectManagersFeedback::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
