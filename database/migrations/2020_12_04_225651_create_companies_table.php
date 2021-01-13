<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('phone');
            $table->string('email')->required();
            $table->string('address')->required();
            $table->string('city')->required();
            $table->string('post_code')->required();
            $table->string('logo')->nullable();
            $table->string('partner_code')->nullable();
            $table->string('site')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
