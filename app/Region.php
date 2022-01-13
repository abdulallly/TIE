<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static latest()
 * @method static find($id)
 */
class Region extends Model{
    public $table = 'regions';
    protected $fillable = [''];
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
    public function councils(){
        return $this->hasMany(Council::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }

    public function headmastersfeedbacks(){
        return $this->hasMany(HeadmastersFeedback::class);
    }

    public function statisticalofficersfeedback(){
        return $this->hasMany(StatisticalOfficersFeedback::class);
    }

    public function projectmanagersfeedback(){
        return $this->hasMany(ProjectManagersFeedback::class);
    }
}
