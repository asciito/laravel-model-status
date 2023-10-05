<?php

namespace Asciito\LaravelModelStatus;

use Asciito\LaravelModelStatus\Status\Contracts\Status;
use Asciito\LaravelPackage\Package\Package;
use Asciito\LaravelPackage\Package\PackageServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class ModelStatusServiceProvider extends PackageServiceProvider
{
    protected function configurePackage(Package $package): void
    {
        $package
            ->setName('model-status')
            ->withConfig();
    }

    /**
     * {@inheritDoc}
     */
    public function packageRegistered(): void
    {
        Blueprint::macro('status', function (array $values, string $column = null) {
            $values = collect($values)
                ->map(function (Status|string $item) {
                    if ($item instanceof Status) {
                        return $item->getValue();
                    }

                    return $item;
                })
                ->all();

            $column ??= config('model-status.column', 'status');

            return $this->enum($column, $values);
        });
    }
}
