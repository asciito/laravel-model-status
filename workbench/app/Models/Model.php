<?php

namespace Workbench\App\Models;

use Asciito\LaravelModelStatus\Status\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Workbench\App\Enums\Status;
use Workbench\Database\Factories\ModelFactory;

class Model extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory, HasStatus;

    protected $fillable = [
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    protected static function newFactory()
    {
        return new ModelFactory;
    }
}
