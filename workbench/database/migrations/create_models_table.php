<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Workbench\App\Enums\Status;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->status(Status::cases())
                ->default(Status::getDefault()->getValue());
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::drop('models');
    }
};