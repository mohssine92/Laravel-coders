<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;


     /* Asignacion masiva indicando los campo bloqueados no se insertan en tabla   */
     protected $guarded = ['id'];


    /* Relacion de uno a muchos  */
    public function courses() {

        $this->hasMany('App\Models\Course');

    }






}
