<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFbAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fb_answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->timestamps();

            $table->unsignedBigInteger('fb_question_id');
            $table->foreign('fb_question_id')->references('id')->on('fb_questions')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fb_answers');
    }
}
