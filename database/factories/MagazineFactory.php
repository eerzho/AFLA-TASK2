<?php

namespace Database\Factories;

use App\Models\Magazine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class DrugFactory
 * @package Database\Factories
 */
class MagazineFactory extends Factory
{
    protected $model = Magazine::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(200),
            'img_path' => 'img/dkzipDVFUrnmeFLwhlZRaH30TpKjl9xDYbWf2sRE.png',
        ];
    }
}
