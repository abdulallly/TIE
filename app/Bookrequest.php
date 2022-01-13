<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookrequest extends Model
{
    public $table = 'bookrequests';
    protected $fillable = [''];

    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function book_category(){
        return $this->belongsTo(Book_category::class);
    }
    public function standard(){
        return $this->belongsTo(Standard::class);
    }
}
