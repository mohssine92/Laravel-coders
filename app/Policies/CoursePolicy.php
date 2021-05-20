<?php

namespace App\Policies;

use App\Models\User;
use  App\Models\Course;

use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

      // objeto user hay que pasarlo si o si a los metodos de esta calse

    public function enrolled(User $user, Course $course){
       /* user autenti matriculado return true  */
        return $course->students->contains($user->id);

    }

    // implemetado en la capa de proteger acceso a cursos no aprobados por admin atraves de Request , atraves del  segmento de la url
    function published (?User $user, Course $course) {
        if($course->status == 3){
            return true;
        }else{
            return false;
        };
    }


}

