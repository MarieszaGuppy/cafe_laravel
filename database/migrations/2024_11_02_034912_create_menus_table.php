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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'menus_category_id'
            );
            $table->text('description');
            $table->bigInteger('price');
            $table->integer('stock')->default(0);
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
        Schema::table('menus', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
