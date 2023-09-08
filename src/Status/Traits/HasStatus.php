<?php

namespace Asciito\LaravelModelStatus\Status\Traits;

use Asciito\LaravelModelStatus\Status\Contracts\Status;
use Asciito\LaravelModelStatus\Status\Scopes\StatusScope;

trait HasStatus
{
    /**
     * This method is executed after the boot model method
     * 
     * @return void
     */
    public static function bootHasStatus(): void
    {
        static::addGlobalScope(new (config('model-status.scope')));
    }

    /**
     * Change the current state
     * 
     * @return bool
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
     * 
     * @return string
     */
    public static function getStatusColumn(): string
    {
        return defined(static::class.'::STATUS_COLUMN') ? static::STATUS_COLUMN : 'status';
    }

    /**
     *
     * Get fully qualified column name of the model
     * 
     * e.g. <table-name>.<status-column-name>
     * 
     * @return string
     */
    public function getQualifiedStatusColumn(): string
    {
        return $this->qualifyColumn(static::getStatusColumn());
    }
}