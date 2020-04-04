<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbltempmapsaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbltempmapsale', function (Blueprint $table) {
            $table->integer('Id_tempmapemployee');
            $table->string('Id_sale',500)->nullable();
            $table->string('Id_create',500)->nullable();
            $table->string('Name',500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbltempmapsale');
    }
}
