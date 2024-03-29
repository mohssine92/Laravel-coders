<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

     /* Asignacion masiva indicando los campo bloqueados no se insertan en objeto description  */
     protected $guarded = ['id'];

    /* relacion uno a uno inversa ,  */
    public function lesson ()
    {
       return $this->hasOne('App\Models\Lesson');
    }


}
