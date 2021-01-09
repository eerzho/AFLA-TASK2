<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class SubstanceFactory
 * @package Database\Factories
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'surname' => $this->faker->lastName,
            'name' => $this->faker->firstName,
            'patronymic' => $this->faker->firstName,
        ];
    }
}
