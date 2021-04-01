<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;


    /* Relacion de uno a muchos  */
    public function courses() {

        $this->hasMany('App\Models\Course');

    }






}
