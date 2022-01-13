<?php

namespace App;
namespace App;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Validation\Rules\In;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @method static find($user_id)
 * @method static where(string $string, string $string1, int $id)
 */
class User extends Authenticatable implements JWTSubject {
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guard_name='web';
    protected $fillable = [''];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function sendPasswordResetNotification($token){
        $this->notify(new ResetPasswordNotification($token));
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function council(){
        return $this->belongsTo(Council::class);
    }
    public function school(){
        return $this->belongsTo(School::class);
    }
    public function projectmanagers(){
        return $this->hasMany(Projectmanager::class);
    }


    public function headmastersfeedbacks(){
        return $this->hasMany(HeadmastersFeedback::class);
    }

    public function statisticalofficersfeedbacks(){
        return $this->hasMany(StatisticalOfficersFeedback::class);
    }

    public function statisticalofficers(){
        return $this->hasMany(StatisticalOfficer::class);
    }

    public function headmasters(){
        return $this->hasMany(Headmaster::class);
    }

    /**
     * @inheritDoc
     */
    public function getJWTIdentifier()
    {
        $this->getKey();
    }

    /**
     * @inheritDoc
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
