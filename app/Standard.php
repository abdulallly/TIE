<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static updateOrCreate(array $array)
 * @method static create(array $array)
 * @method static where(string $string, string $string1, string $string2)
 */
class Standard extends Model{
    public $table = 'standards';
    protected $fillable = ['name'];
    public function bookcategories(){
        return $this->hasMany(Book_category::class);
    }
    public function schoolinformation(){
        return $this->hasMany(School_information::class);
    }
    public function school(){
        return $this->belongsTo(School::class);
    }

}
