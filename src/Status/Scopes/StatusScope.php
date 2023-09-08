<?php

namespace Asciito\LaravelModelStatus\Status\Scopes;

use Asciito\LaravelModelStatus\Status\Contracts\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StatusScope implements Scope
{
    protected array $extensions = ['WithStatus'];

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model): void
    {
        //
    }
    
    /**
     * Extend the query builder with the needed functions.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    public function extend(Builder $builder)
    {
        foreach ($this->extensions as $extension) {
            $this->{"add{$extension}"}($builder);
        }
    }

    protected function addWithStatus(Builder $builder)
    {
        $builder->macro('withStatus', function (Builder $builder, Status|string $state) {
            $model = $builder->getModel();

            if ($state instanceof Status) {
                $state = $state->value;
            }

            return $builder->where($model->getQualifiedStatusColumn(), $state);
        });
    }
}
