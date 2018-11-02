<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilitaryDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_data', function (Blueprint $table) {
            $table->increments('id');
            $table->char('military_number',16);
            $table->integer('military_area_id');
            $table->char('military_delay_number',16)->nullable();
            $table->date('military_delay_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('military_data');
    }
}
