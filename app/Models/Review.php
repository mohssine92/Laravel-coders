<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

     /* Asignacion masiva indicando los campo bloqueados no se insertan en tabla   */
     protected $guarded = ['id'];

    /* Relacion de uno a muchos inversa  */

    public function users(){

       return $this->belongsTo('App\Models\User');

    }

    public function course(){

        return $this->belongsTo('App\Models\Course');

    }


}
