<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

     /* relacion uno a uno  */
    public function description()
    {
       return $this->hasOne('App\Models\Description');
    }

    /* relacion uno a mucho inverrsa */
    public function setcion()
    {
       return $this->belongsTo('App\Models\Section');
    }

    public function platform()
    {
        return $this->belongsTo('App\Models\Platform');
    }

    /* Relacion de mucho a mucho , consta de tabal pivote */
    public function users ()
    {
       return $this->belongsToMany('App\Models\User');
    }

}
