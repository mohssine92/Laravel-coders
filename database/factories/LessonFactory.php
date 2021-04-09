<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'    =>  $this->faker->sentence(),
            'url'     => 'https://youtu.be/xin92Rq3pco',
            'ifram'  => '<iframe width="560" height="315" src="https://www.youtube.com/embed/xin92Rq3pco" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'platform_id' => 1
             /* section_id  => cuando se genera id de section me lo inserta dinamicamente */
        ];
    }
}
