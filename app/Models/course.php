<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

     /* Asignacion masiva indicando los campo bloqueados no se insertan en tabla   */
     protected $guarded = ['id','status'];

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;


   /* Relacion de uno a muchos  */
   public function reviews(){
     return $this->hasMany('App\Models\Review');
   }

   public function requirements (){
     return $this->hasMany('App\Model\Requirement');
   }

   public function goals (){
    return $this->hasMany('App\Model\Goal');
   }

  public function audiences (){
    return $this->hasMany('App\Model\Audience');
  }

  public function sections (){
    return $this->hasMany('App\Model\Section');
  }

   /* Relacion de uno a mucho inversa ,  */  /* si el nombre de metodo relacion sera diferente a la entidad es obligatorio declarar attributo referente  */
   public function teacher(){
     return $this->belongsTo('App\Models\User', 'user_id');
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


  /* Relacion de muchos a muchos  */ /* Rwquired  pivote table */
   public function students(){
     return $this->belongsToMany('App\Models\User'); /* me extraeuna coleccion de objetos de 0 a n objetos  */
   }

   /* Relacion uno a uno polimorfica */
   public function image()
   {
      return $this->morphOne('App\Models\Image', 'imageable');
   }

   /* aprovecho la relacion entre courses y section , y sections y lessons genero relacion entre courses y lessons*/
   public function lessons()
   {
       return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');  /* section modelo intermedio  */
   }



}
