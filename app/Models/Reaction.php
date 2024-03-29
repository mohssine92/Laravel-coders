<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

     /* Asignacion masiva indicando los campo bloqueados no se insertan en tabla   */
     protected $guarded = ['id'];

    CONST LIKE = 1;
    CONST DISLIKE = 2;


    /* Relacion uno a mucho inversa */
    public function user ()
    {
       return $this->belongsTo('App\Models\User');
    }

     /* especificar que voy a utulizar relacion polimorfica */
     public function rectionable ()
     {
        return $this->morphTo();
     }


}
