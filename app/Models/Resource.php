<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

     /* especificar que voy a utulizar relacion polimorfica */
     public function resourceable ()
     {
        return $this->morphTo();
     }

}
