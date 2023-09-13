<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Status Scope
    |--------------------------------------------------------------------------
    |
    | This value is the FQCN for the scope use in the HasStatus Trait, and
    | you can change the default scope. We recomend you to extend the StatusScope
    | on your own class so you can just overwrite the apply method.
    |
    */
    'scope' => \Asciito\LaravelModelStatus\Status\Scopes\StatusScope::class,

    /*
    |--------------------------------------------------------------------------
    | Status Column Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of the colum use by default all the models that
    | uses the Trait.
    |
    | Be aware if you change this value all the models should have a column
    | with this name, but if you want to use a different name in by model, you
    | can add the class constant 'static::STATUS_COLUM' and set the name of
    | the column you want to use.
    |
    */
    'column' => 'status',
];
