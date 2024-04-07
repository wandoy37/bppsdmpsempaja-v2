<?php

namespace Database\Factories;

use App\Models\Postingan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postingan>
 */
class PostinganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Postingan::class;


    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'slug' => mt_rand(1000, 9999),
            'konten' => $this->faker->text(1000),
            'thumbnail' => 'dummy_thumbnail.jpg',
            'status' => 'publish',
            'kategori_id' => mt_rand(4, 7),
            'user_id' => '1',
        ];
    }
}
