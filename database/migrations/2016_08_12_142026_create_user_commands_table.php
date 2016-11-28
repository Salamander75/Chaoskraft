<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_commands', function (Blueprint $table) {
            $table->increments('ucmd_id');
            $table->integer('user_id')->unsigned();
            $table->string('command',100);
            $table->timestamps();
        });

        Schema::table('user_commands', function($table) {
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
        Schema::drop('user_commands');
    }
}
