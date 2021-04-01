<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;


   /* Relacion de uno a mucho inversa , al ver inversa segnifica que esta entidad es debil */
   public function teacher(){

     $this->belongsTo('App\Models\User','user_id'); /* toma en cuenta $this->user_id referente a id de users , extrae de users table un objeto de user */
                                                    /* declaro explicitamente de la lleve forrene es user_id */
   }
   public function level(){

     return $this->belongsTo('App\Models\Level');

   }
   public function price(){

    return $this->belongsTo('App\Models\Price');

  }
  public function category(){

    return $this->belongsTo('App\Models\Category');

 }

  /* Relacion de muchos a muchos  */
  public function students(){

     return $this->belongsToMany('App\Models\User'); /* me extraeuna coleccion de objetos de 0 a n objetos  */

  }

   /* Relacion de uno a muchos  */
   public function reviews(){

        return $this->hasMany('App\Models\Review');

   }




}
