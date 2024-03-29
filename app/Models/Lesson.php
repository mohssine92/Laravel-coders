<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

     /* Asignacion masiva indicando los propiedad del objeto bloqueados no se insertan en tabla  */
     protected $guarded = ['id'];

    // propiedad computada
    public function getCompletedAttribute(){
      // esta logica verifica si objeto con id alumno autenticado existe en la coleccion returna true
      // estas props computadas nos vitamina con mas detalles sobre el Objetomodelo comunicado
       return $this->users->contains(auth()->user()->id);
    }


     /* relacion uno a uno  */
    public function description()
    {
       return $this->hasOne('App\Models\Description');
       // returna objeto de la decripcio de la leccion en case de exitir registro
       // que describa la leccion.
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
       // returna colleccion de objetos de alumnos que han terminado esta leccion comunicada
       return $this->belongsToMany('App\Models\User');
    }

    /* Relacion uno a uno Polimorfica , 2 params metodo ... */
    public function resource ()
    {
        return $this->morphone('App\Models\Resource', 'resourceable');
    }

    /* Relacion de uno a muchos Polimorfica , 2 params es un metodo donde especificamos que vamos a aceptar relacion polimorficas */
    public function comments ()
    {
       $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions ()
    {
       $this->morphMany('App\Models\Reaction', 'reactionable');
    }

}
