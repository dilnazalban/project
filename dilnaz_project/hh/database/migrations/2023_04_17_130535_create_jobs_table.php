<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('company_name');
            $table->boolean('schedule');
            $table->bigInteger('author_id');
            $table->bigInteger('salary');
            $table->foreignId('category_id')->default(1)
                ->constrained()
                ->restrictOnDelete();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
