<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;  /* para generar slug requiere esta class */

use App\Models\User;
use App\Models\Level;
use App\Models\category;
use App\Models\price;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;
    protected $status = [ Course::BORRADOR, Course::REVISION, Course::PUBLICADO ];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* Generar datos falsos posteriormente insertamos en tabla correspondiente o tablas cresspondientres segun el caso video :9 */

        /* TODO slug se usa para rutas amigables => ex : hola Mundo , su slug es hola-mundo */
        $title = $this->faker->sentence();
        $slug = Str::slug($title);

        return [
            'title'       => $title,
            'subtitle'    => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status'      => $this->faker->randomElement( $this->status ), /* retorna aleatoriament elemento  del array */
            'slug'        => $slug,
            'user_id'     => User::all()->random()->id,
            'level_id'    => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id'    => price::all()->random()->id

        ];

    }
}
