<?php

namespace App;

use App\Http\Controllers\HeadmasterRequestController;
use Illuminate\Database\Eloquent\Model;

class Invoicereference extends Model{

    public function council(){
        return $this->belongsTo(Council::class);
    }

    public function projectmanager(){
        return $this->belongsTo(ProjectManager::class);
    }


    public function statisticalofficer(){
        return $this->belongsTo(Statisticalofficer::class);
    }
}
