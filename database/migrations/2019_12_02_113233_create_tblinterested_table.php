<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblinterestedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblinterested', function (Blueprint $table) {
            $table->bigIncrements('Id_interested');
            $table->string('Name',500)->nullable();
            $table->string('Phone',500)->nullable();
            $table->string('Email',500)->nullable();
            $table->string('Id_car',500)->nullable();
            $table->string('CarEvaID',500)->nullable();
            $table->string('Status',500)->nullable();
            $table->string('Meet_date',500)->nullable();
            $table->string('Meet_time',500)->nullable();
            $table->string('Meet_place',500)->nullable();
            $table->string('Create_date',500)->nullable();
            $table->string('Create_id',500)->nullable();
            $table->string('Update_date',500)->nullable();
            $table->string('Update_id',500)->nullable();
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
        Schema::dropIfExists('tblinterested');
    }
}
