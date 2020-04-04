<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbluserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbluser', function (Blueprint $table) {
            $table->integer('id',11);
            $table->string('Username',500)->nullable();
            $table->string('Password',500)->nullable();
            $table->string('Phone',500)->nullable();
            $table->string('Email',500)->nullable();
            $table->string('User_level',500)->nullable();
            $table->string('Flag_active',500)->nullable();
            $table->string('Create_date',500)->nullable();
            $table->string('Create_id',500)->nullable();
            $table->string('Update_date',500)->nullable();
            $table->string('Update_id',500)->nullable();
            $table->string('Firstname',500)->nullable();
            $table->string('Lastname',500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbluser');
    }
}
