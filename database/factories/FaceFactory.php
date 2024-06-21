<?php

namespace Database\Factories;

use App\Models\Face;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Face>
 */
class FaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Face::class;
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => 'photo.jpg',
        ];
    }
}
