<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('world_areas', function (Blueprint $table) {
            $table->increments('warea_id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->smallInteger('resource1')->unsigned()->nullable();
            $table->tinyInteger('generate_resource1')->nullable();
            $table->smallInteger('resource2')->unsigned()->nullable();
            $table->tinyInteger('generate_resource2')->nullable();
            $table->smallInteger('resource3')->unsigned()->nullable();
            $table->tinyInteger('generate_resource3')->nullable();
            $table->smallInteger('resource4')->unsigned()->nullable();
            $table->tinyInteger('generate_resource4')->nullable();
            $table->smallInteger('resource5')->unsigned()->nullable();
            $table->tinyInteger('generate_resource5')->nullable();
            $table->integer('world_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('world_areas', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('resource1')->references('res_id')->on('resources');
            $table->foreign('resource2')->references('res_id')->on('resources');
            $table->foreign('resource3')->references('res_id')->on('resources');
            $table->foreign('resource4')->references('res_id')->on('resources');
            $table->foreign('resource5')->references('res_id')->on('resources');
            $table->foreign('world_id')->references('world_id')->on('worlds');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('world_areas');
    }
}
