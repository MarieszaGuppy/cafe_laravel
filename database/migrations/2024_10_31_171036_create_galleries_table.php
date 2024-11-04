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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'galleries_author_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'galleries_category_id'
            );
            $table->text('description');
            $table->string('slug');
            $table->timestamps('');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
        Schema::table('articles', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
