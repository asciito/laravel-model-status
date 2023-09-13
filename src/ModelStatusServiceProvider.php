<?php

namespace Asciito\LaravelModelStatus;

use Asciito\LaravelModelStatus\Status\Contracts\Status;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class ModelStatusServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function register(): void
    {
        //
        Blueprint::macro('status', function (array $values, string $column = null) {
            $values = collect($values)
                ->map(function (Status|string $item) {
                    if ($item instanceof Status) {
                        return $item->getValue();
                    }

                    return $item;
                })
                ->all();

            $columnName = $column ?? config('model-status.column', 'status');

            return $this->enum($columnName, $values);
        });
    }

    public function boot(): void
    {
        $this->loadConfig();
    }

    protected function loadConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/model-status.php', 'model-status');
    }
}
