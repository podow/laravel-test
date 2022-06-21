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
        Schema::create('user_options', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('question_id')->nullable(false);
            $table->foreign('question_id')->references('id')->on('questions')->cascadeOnDelete();

            $table->unsignedBigInteger('option_id')->nullable(false);
            $table->foreign('option_id')->references('id')->on('options')->cascadeOnDelete();

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->text('text')->nullable(true);

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
        Schema::dropIfExists('user_options');
    }
};
