<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;




    /* especificar que voy a aceptar relacion polimorfica */
    public function commentable ()
    {
       return $this->morphTo();
    }

     /* Relacion uno a mucho inversa */
     public function user ()
     {
        return $this->belongsTo('App\Models\User');
     }

    /* Relacion de uno a muchos Polimorfica con mismo modelo , un comentario puede ser comentado  */
    public function Comments()
    {
         return $this->morphMany('App\Models\Comment', 'commentable');
    }

    /* Relacion a mucho Polimorfica comentarios Reciben likes */
    public function reactions()
    {
         return $this->morphMany('App\Models\Reaction', 'reactionable');
    }


}
