<?php

namespace App;

use App\Http\Controllers\HeadmasterRequestController;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model{
    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function council(){
        return $this->belongsTo(Council::class);
    }
    public function book_category(){
        return $this->belongsTo(Book_category::class);
    }
    public function school(){
        return $this->belongsTo(School::class);
    }
    public function standard(){
        return $this->belongsTo(Standard::class);
    }

    public function projectmanager(){
        return $this->belongsTo(ProjectManager::class);
    }

    public function statisticalofficer(){
        return $this->belongsTo(Statisticalofficer::class);
    }

    public function headmaster(){
        return $this->belongsTo(Headmaster::class);
    }
}
