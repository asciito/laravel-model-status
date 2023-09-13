<?php

namespace Workbench\App\Enums;

enum Status: string implements \Asciito\LaravelModelStatus\Status\Contracts\Status
{
    case LOREM = 'lorem';
    case IPSUM = 'ipsum';
    case DOLOR = 'dolor';

    /**
     * {@inheritDoc}
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     */
    public static function getDefault(): static
    {
        return self::IPSUM;
    }
}
