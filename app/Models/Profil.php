<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

     /* Asignacion masiva indicando los campo bloqueados no se insertan en tabla   */
     protected $guarded = ['id'];


    /* Relacion uno a uno inversa */
    public function user(){

       $this->belongsTo('App\Models\User');

    }
}
