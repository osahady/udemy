<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('enrollment_id')->unique();
            $table->unsignedtinyInteger('stars')->length(2)->default(0);
            $table->text('content')->nullable();
            $table->timestamps();

            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
