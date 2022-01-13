<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 * @method static select(string $string, string $string1)
 */
class Book_category extends Model{
    public $table = 'book_categories';
    protected $fillable = ['name','quantity','standard_id','book_id'];
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function standard(){
        return $this->belongsTo(Standard::class);
    }
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
