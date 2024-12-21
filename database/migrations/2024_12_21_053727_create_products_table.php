<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('author');
            $table->mediumText('title');
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail', 150)->nullable();
            $table->text('gallery')->nullable();
            $table->mediumText('slug')->nullable();
            $table->enum('status', ['draft', 'pending', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
