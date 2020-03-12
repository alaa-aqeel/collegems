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
        // Schema::dropIfExists('users');


        Schema::create('users', function (Blueprint $table) {
            // $table->engine = 'InnoDB';

            $table->bigIncrements('id');


            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->default('avatar.png');
            $table->string('gender');
            $table->string('work')->nullable();
            $table->string('github')->nullable();

            //
            $table->tinyInteger('active')->default(0);

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
