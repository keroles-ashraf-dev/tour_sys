<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->unsignedInteger('min_adults_count')->nullable();
            $table->unsignedInteger('min_children_count')->nullable();
            $table->unsignedDecimal('adult_discount', 2, 2)->nullable();
            $table->unsignedDecimal('child_discount', 2, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals');
    }
};
