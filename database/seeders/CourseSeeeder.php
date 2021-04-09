<?php

namespace Database\Seeders;
use Database\Factories\CourseFactory;
use Illuminate\Database\Seeder;

use App\Models\course;
use App\Models\Image;

class CourseSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* En este caso me hace faltta generar un factoryCourse porque voy a insertra muchos objetos de tipo Course */ /* factory() genera n de objetos lo pasa en colleccion a create() */
        $courses = Course::factory(40)->create();

        /* restacar courses y correrlo , objetivo es alimentacion de objeto image de tabla images(Polimorfica) */
        foreach ($courses as $course ) {

            Image::factory(1)->create([
                'imageable_id'    => $course->id,
                'imageable_type'  => 'App\Models\Course'
            ]);

        }


    }

}

