<?php

use Workbench\App\Enums\Status;
use Workbench\App\Models\ConstantStatusColumnModel;
use Workbench\App\Models\Model;

use function Pest\Laravel\assertDatabaseCount;

it('create a model that uses HasStatus trait', function () {
    $model = Model::factory()->create(['status' => Status::DOLOR]);

    expect($model->status)->toBe(Status::DOLOR);
});

it('check if the model has a default state', function () {
    $model = Model::factory()->create();

    expect($model->status)->toBe(Status::getDefault());
});

it('change the model status', function () {
    $model = Model::factory()->create();

    expect($model->status)
        ->toBe(Status::getDefault())
        ->and($model->changeState(Status::DOLOR))
        ->toBeTrue()
        ->and($model->status)
        ->toBe(Status::DOLOR);
});

it('show only default state', function () {
    Model::factory(5)->create();

    Model::factory()->create(['status' => Status::IPSUM]);
    Model::factory(2)->create(['status' => Status::LOREM]);
    Model::factory(2)->create(['status' => Status::DOLOR]);

    assertDatabaseCount('models', 10);

    expect(Model::withStatus(Status::IPSUM)->count())
        ->toBe(6)
        ->and(Model::withStatus(Status::LOREM)->count())
        ->toBe(2)
        ->and(Model::withStatus(Status::DOLOR)->count())
        ->toBe(2);
});

test('a model with constant status column defined', function () {
    $model = ConstantStatusColumnModel::factory()->create();

    expect(property_exists($model, 'my_status_column'))
        ->toBeTrue()
        ->and($model->my_status_column)
        ->toBe(Status::LOREM);
});
