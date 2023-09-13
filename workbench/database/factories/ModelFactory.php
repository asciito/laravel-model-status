<?php

namespace Workbench\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Workbench\App\Enums\Status;
use Workbench\App\Models\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Workbench\App\Model>
 */
class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => Status::getDefault(),
        ];
    }
}
