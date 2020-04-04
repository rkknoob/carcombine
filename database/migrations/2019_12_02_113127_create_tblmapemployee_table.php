<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblmapemployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmapemployee', function (Blueprint $table) {
            $table->integer('Id_mapemployee');
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
        Schema::dropIfExists('tblmapemployee');
    }
}
