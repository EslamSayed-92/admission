<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->string('function');
            $table->unsignedInteger('preceeding_step_id');
            $table->unsignedInteger('next_step_id');
            $table->unsignedInteger('process_id');
            $table->timestamps();
            $table->foreign('preceeding_step_id')->references('id')->on('step')
                ->onDelete('cascade');
            $table->foreign('next_step_id')->references('id')->on('step')
                ->onDelete('cascade');
            $table->foreign('process_id')->references('id')->on('process')
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
        Schema::dropIfExists('step');
    }
}
