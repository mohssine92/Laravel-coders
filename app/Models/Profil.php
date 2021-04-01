<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;


    /* Relacion uno a uno inversa */
    public function user(){

       $this->belongsTo('App\Models\User'); /* toma en cuenta $this->user_id pertenece a id de user - lo que hace simplemente extraeme ubjeto de propiedad de la entidad user */

    }
}
