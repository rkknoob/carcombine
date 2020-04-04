<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblinterestedDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblinterested_detail', function (Blueprint $table) {
            $table->bigIncrements('Id_interesteddetail');
            $table->string('Id_interested',500)->nullable();
            $table->string('Status',500)->nullable();
            $table->string('Remark',500)->nullable();
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
        Schema::dropIfExists('tblinterested_detail');
    }
}
