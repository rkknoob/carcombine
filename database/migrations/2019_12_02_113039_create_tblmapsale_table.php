<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblmapsaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmapsale', function (Blueprint $table) {
            $table->bigIncrements('Id_mapsale');
            $table->string('Id_user',500)->nullable();
            $table->string('Id_interested',500)->nullable();
            $table->string('Create_date',500)->nullable();
            $table->string('Create_id',500)->nullable();
            $table->string('Update_date',500)->nullable();
            $table->string('Update_id',500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblmapsale');
    }
}
