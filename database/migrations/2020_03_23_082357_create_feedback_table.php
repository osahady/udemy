<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->unsignedBigInteger('enrollment_id');
            $table->unsignedBigInteger('fb_question_id');
            $table->unsignedBigInteger('fb_answer_id');
            $table->timestamps();

            $table->unique(['enrollment_id', 'fb_question_id']);
            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('CASCADE');
            $table->foreign('fb_question_id')->references('id')->on('fb_questions')->onDelete('CASCADE');
            $table->foreign('fb_answer_id')->references('id')->on('fb_answers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
