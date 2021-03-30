<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

/* => la idea es crear cada clasefactori para cada modelo , es donde estanciamos ese modelo y indicarle que tipo de datos queremos que se llenan las prop del objeto
     generar clase  factory => php artisan make:factory nombreDemiFactory --model=miModel
     los factories seran nuestra fabrica , donde asignamos datos a los modelos
     2 paso - generar clase seeder de este factori => llamos al modelos ejecutando el metodo estatica donde pasamos por params numero de instancias a fabricar es decir numero de registros a insertar ex: Curso::factory(50)->creat();
     luego como vemos ejecutamos metod de la classe model que extiend el modelo comunicado , pero para ejecutar estos metodo de este nivel tenemos la necesidad de comando artisan uno de ellos burra todo y inserta de nuevo es
       php artisan migrate:fresh --seed => ojo este comando ejecuta DatanaseSeeder*/
