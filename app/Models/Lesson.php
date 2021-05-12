<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

     /* Asignacion masiva indicando los campo bloqueados no se insertan en tabla   */
     protected $guarded = ['id'];

    // añadir attributo al objeto Lesson , como se fuera propieda del objeto
    public function getCompletedAttribute(){
      // escribir logica que quiere que tenga este attributo
       return $this->users->contains(auth()->user()->id); // : True

    }


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
