<?php

namespace Database\Seeders;

use App\Models\Magazine;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        \App\Models\Author::factory(10)->create();

        \App\Models\Magazine::factory(10)->create()->each(function (Magazine $magazine) {
            $magazine->authors()->attach([1, 2]);
        });

        \App\Models\Magazine::factory(10)->create()->each(function (Magazine $magazine) {
            $magazine->authors()->attach([1, 2, 3]);
        });

        \App\Models\Magazine::factory(2)->create()->each(function (Magazine $magazine) {
            $magazine->authors()->attach([1, 2, 3, 4]);
        });

        \App\Models\Magazine::factory(2)->create()->each(function (Magazine $magazine) {
            $magazine->authors()->attach([2, 3, 4, 5, 6]);
        });

        \App\Models\Magazine::factory(2)->create()->each(function (Magazine $magazine) {
            $magazine->authors()->attach([3, 4, 5, 6, 7]);
        });

        \App\Models\Magazine::factory(2)->create()->each(function (Magazine $magazine) {
            $magazine->authors()->attach([1, 2, 3, 4]);
        });

        \App\Models\Magazine::factory(2)->create()->each(function (Magazine $magazine) {
            $magazine->authors()->attach([2, 3, 4, 5, 6]);
        });
    }
}
