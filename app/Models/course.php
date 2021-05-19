<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

     /* Asignacion masiva indicando , propiedades del objeto comunicado , que no deben insertarse en coleccion en Db   */
     protected $guarded = ['id','status'];

    /* Adiciona atrributos al objeto del curso comunicado con el numero de registros relacionados al id course . Ex =>  reviews_count: 0  */
    // se usa para saber cuantos alumnos registrados en curso y cuantos reviews tiene un curso , mas dertalles sobre el objeto curso
    protected $withCount = ['students', 'reviews'];

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    // propieda computada
    /* avg() sacar promedio de la cifra en columna rating */
    public function getRatingAttribute()
    {
       if($this->reviews_count > 0){
         return round( $this->reviews->avg('rating') , 1 );
       }else{
           return 5;
           // asi cuando el curso nuevo se inicia con 5 estrellas
       }
    }


    /* query Scopes  v16 min : 16*/
    public function scopeCategory($query, $category_id){
       if($category_id){
          return $query->where('category_id', $category_id);
       }

    }

    public function scopeLevel($query, $level_id){
        if($level_id){
           return $query->where('level_id', $level_id);
        }

     }


     /* subscribir metodo de la clase Model  */
    /* si paso paso objeto como argumento  me toma esta propiedad de este modelo , es lo que hace este metodo*/
    // realmente hemos aplicado concepto de redefinicion .
    public function getRouteKeyName()
    {
        return 'slug';
    }

   /* Relacion de uno a muchos  */
   public function reviews(){
     return $this->hasMany('App\Models\Review');
   }

   public function requirements (){
     return $this->hasMany('App\Models\Requirement');
   }

   public function goals (){
    return $this->hasMany('App\Models\Goal');
   }

  public function audiences (){
    return $this->hasMany('App\Models\Audience');
  }

   // relacion de uno a muchos y directa
  public function sections (){
    return $this->hasMany('App\Models\Section');
    //  return coleccion de todos secciones pertenezan a un curso
  }

   /* Relacion de uno a mucho inversa */
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
    // esta relacion me recupera all lessons has each section of this course
    // retuena una colleccion de los lessons pertenezan a un curso = array
   }



}
