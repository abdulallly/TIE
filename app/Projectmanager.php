<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectmanager extends Model{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    public function invoicereferences(){
        return $this->hasMany(Invoice::class);
    }
}
