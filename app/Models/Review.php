<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;


    /* Relacion de uno a muchos inversa  */

    public function users(){

       return $this->belongsTo('App\Models\User');  /* toma en cuenta estos $this->user_id pertenecen a id en user  */

    }

    public function course(){

        return $this->belongsTo('App\Models\Course');  /* toma en cuenta estos $this->user_id pertenecen a id en user  */

     }


}
