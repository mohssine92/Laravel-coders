<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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


    /* Relacion uno a uno . => un ususario solo puede tener un perfil , y un perfil solo pertenece a un usuarios */
    public function perfile () {

      return $this->hasone('App\Models\Profile'); /* toma en cuenta this->id referente a id_user lo que hace simplemente extraeme objeto de propiedad de la entidad user  */

    }

    /* Relacion de uno a muchos , un profesor puede tener 0 curso a n cursos , mientras un curso pertenece 1 profesor como minimo y a 1 profe como maximo  */
    public function courses_dictated() {

      return $this->hasMany('App\Models\Course'); /* Toma en cuenta $this->id referente user_id en course  - lo que hace extiende una colleccion de objetos de zero objeto a n objetos de la entidad course */

    }

    /* Relacion de muchos a muchos , un user de perfil alumno puede estar suscrito en varios cursos , mientra un curso puede tener varios user de perfil alumnos matriculados en el */ /* requiere tabla pivote */
     public function courses_enrolled(){

       return $this->belongsToMany('App\Models\Course'); /* Toma en cuenta $this->id users (perfil alumno) referente user_id en course_user table pivote  */

     }

     /* Relacion de uno a muchos  */
     public function reviews(){

        return $this->hasMany('App\Models\Review');

     }





}


