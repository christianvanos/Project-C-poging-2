<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBacklogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_product_backlog');
            $table->double('order');
            $table->string('label');
            $table->integer('sprint_id')->unsigned();
            $table->timestamps();
            $table->foreign('sprint_id')->references('id')->on('sprints')
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
        Schema::dropIfExists('backlogs');
    }
}
