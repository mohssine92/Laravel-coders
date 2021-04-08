<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

     /* especificar que voy a utulizar relacion polimorfica */
     public function imageable ()
     {
        return $this->morphTo();
     }



}
