<?php

namespace Workbench\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Workbench\App\Enums\Status;
use Workbench\App\Models\ConstantStatusColumnModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Workbench\App\Model>
 */
class ConstantStatusColumnModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConstantStatusColumnModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'my_status_column' => Status::LOREM,
        ];
    }
}
