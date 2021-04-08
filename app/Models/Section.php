<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

     /* Asignacion masiva indicando los campo bloqueados no se insertan en tabla   */
     protected $guarded = ['id'];


      /* Relacion de uno a muchos*/
    public function lessons (){
      return $this->hasMany('App\Models\lesson');
    }

    /* Relacion de uno a mucho inversa */
    public function course (){
      return $this->belongsTo('App\Models\Course');
    }


}
