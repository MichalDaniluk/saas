<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_short')->nullable();
            $table->string('title_english')->nullable();
            $table->string('slug')->nullable();
            $table->string('specialization')->nullable();
            $table->string('specialization_english')->nullable();
            $table->double('price',8,2)->nullable();
            $table->string('type')->nullable();
            $table->text('comment')->nullable();
            $table->text('content')->nullable();
            $table->string('image_small')->nullable();
            $table->string('image_big')->nullable();
            $table->bigInteger('company_id',false,true);
            $table->bigInteger('user_id',false,true);
            $table->timestamps();


            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
