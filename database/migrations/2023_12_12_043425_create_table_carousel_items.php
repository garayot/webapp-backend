<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::dropIfExists('carousel_items');

        Schema::create('carousel_items', function (Blueprint $table) {
            $table->bigIncrements('carousel_item_id');
            $table->string('carousel_name')->nullable();
            $table->string('image_path');
            $table->string('description')->nullable();
            $table->timestamps();
        }, 'if not exists');

        Schema::table('carousel_items', function (Blueprint $table) {
            // Check if the column exists before adding it
            if (!Schema::hasColumn('users', 'user_id')) {
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousel_items');
    }
};
