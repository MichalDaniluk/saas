<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->text('comments')->nullable();
            $table->enum('installment', ['Yes', 'No', 'ToReturn', 'Returned', 'FullPayment', 'NoReturn']);
            $table->enum('status', ['Active', 'Trash', 'NoCall', 'Resignation', 'Graduate', 'Decision', 'Interested']);
            $table->double('due', 8, 2);
            $table->date('from');
            $table->date('to');
            $table->string('partner_code')->nullable();
            $table->string('promotion_code')->nullable();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('comments_company')->nullable();
            $table->string('acount_number')->nullable();
            $table->string('site')->nullable(); //website's name order com from
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('company_id')
                ->constrained('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
