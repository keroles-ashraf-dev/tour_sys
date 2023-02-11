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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedInteger('adults_count');
            $table->unsignedInteger('children_count');
            $table->unsignedDecimal('adult_price');
            $table->unsignedDecimal('child_price');
            $table->timestamp('date');
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
        Schema::dropIfExists('bookings');
    }
};
