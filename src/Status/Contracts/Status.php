<?php

namespace Asciito\LaravelModelStatus\Status\Contracts;

interface Status
{
    /**
     * Get the value of the current state
     * 
     * @return string
     */
    public function getValue(): string;

    /**
     * Get the default state
     * 
     * @return string
     */
    public static function getDefault(): static;
}