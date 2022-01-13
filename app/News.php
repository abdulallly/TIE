<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static latest()
 * @method static find($id)
 */
class News extends Model{
    public $table = 'news';
    protected $fillable = [''];

}
