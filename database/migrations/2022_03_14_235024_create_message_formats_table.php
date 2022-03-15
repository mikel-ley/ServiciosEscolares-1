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
        Schema::create('message_formats', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->unsignedBigInteger('from_user_id');
            $table->foreign('from_user_id')->references('id')->on('users');

            $table->unsignedBigInteger('to_user_id');
            $table->foreign('to_user_id')->references('id')->on('users');

            $table->string('subject');
            $table->text('body');
            $table->string('file');
            
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
        Schema::dropIfExists('message_formats');
    }
};
