<?php

namespace Asciito\LaravelModelStatus\Status\Traits;

use Asciito\LaravelModelStatus\Status\Contracts\Status;

trait HasStatus
{
    /**
     * This method is executed after the boot model method
     */
    public static function bootHasStatus(): void
    {
        static::addGlobalScope(new (config('model-status.scope')));
    }

    /**
     * Change the current state
     */
    public function changeState(Status $status): bool
    {
        $updated = $this->update([
            $this->getStatusColumn() => $status,
        ]);

        return $updated;
    }

    /**
     * Get status column name
     */
    public static function getStatusColumn(): string
    {
        return defined(static::class.'::STATUS_COLUMN') ? static::STATUS_COLUMN : 'status';
    }

    /**
     * Get fully qualified column name of the model
     *
     * e.g. <table-name>.<status-column-name>
     */
    public function getQualifiedStatusColumn(): string
    {
        return $this->qualifyColumn(static::getStatusColumn());
    }
}
