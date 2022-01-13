<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static updateOrCreate(array $array)
 * @method static find(int $id)
 * @method static where(string $string, string $string1, string $string2)
 */
class Book extends Model{
    protected $fillable = ['name'];
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
    public function bookcategorys(){
        return $this->hasMany(Book_category::class);
    }
}
