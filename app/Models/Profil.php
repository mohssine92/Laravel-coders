<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;


    /* Relacion uno a uno inversa */
    public function user(){

       $this->belongsTo('App\Models\User');

    }
}
