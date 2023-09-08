<?php

namespace Workbench\App\Models;

use Asciito\LaravelModelStatus\Status\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Workbench\App\Enums\Status;
use Workbench\Database\Factories\ConstantStatusColumnModelFactory;

class ConstantStatusColumnModel extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory, HasStatus;

    const STATUS_COLUMN = 'my_status_column';

    protected $fillable = [
        'my_status_column',
    ];

    protected $casts = [
        'my_status_column' => Status::class,
    ];

    protected static function newFactory()
    {
        return new ConstantStatusColumnModelFactory;
    }
}
