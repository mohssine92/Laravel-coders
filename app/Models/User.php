<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles; // paquetes de spatie.be ver video 28


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles; // parece php intelephense no ha reconocido la classe , profe declaro que funcinaria sin proplema ./ asi  ya estoy icluyendo la relacion de rol y permission con user




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /* asignacion masiva los campos que tienen permiso a insertarse en tabla  */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    /* Relacion uno a uno . */
    public function perfile () {

      return $this->hasone('App\Models\Profile');

    }

    /* Relacion de uno a muchos ,   */
    public function courses_dictated()
     {
         return $this->hasMany('App\Models\Course');
     }

    /* Relacion de muchos a muchos ,/  /* requiere tabla pivote */
     public function courses_enrolled()
     {
       return $this->belongsToMany('App\Models\Course');
     }

     // Relacion de mucho a mucho consta de tabla pivote ,
     // lessons culminados por user alumno
     public function lessons ()
     {
        return $this->belongsToMany('App\Models\Lesson');
     }

     /* Relacion de uno a muchos  */
     public function reviews()
     {
        return $this->hasMany('App\Models\Review');
     }

     public function comments()
     {
        return $this->hasMany('App\Models\Comment');
     }

     public function reactions()
     {
        return $this->hasMany('App\Models\Reaction');
     }





}


