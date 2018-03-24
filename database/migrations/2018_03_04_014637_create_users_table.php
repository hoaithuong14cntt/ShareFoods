<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->unsignedInteger('prefecture_id')->nullable();
            $table->string('address')->nullable();
            $table->text('memo')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone', 13)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('type')->default(1);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('prefecture_id')
                ->references('id')
                ->on('prefectures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
