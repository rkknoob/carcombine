<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcarinsoection2carcombine', function (Blueprint $table) {
            $table->string('CarEvaID',15);
            $table->string('Dealer_Name',255)->nullable();
            $table->string('CarBrandName',200)->nullable();
            $table->string('CarBrandGenName',200)->nullable();
            $table->date('CarRegisterDate')->nullable();
            $table->string('CarYear',4)->nullable();
            $table->string('CarGearID',4)->nullable();
            $table->string('CarColorName',200)->nullable();
            $table->string('CarEngine',50)->nullable();
            $table->integer('CarOwnerAmount')->nullable();
            $table->integer('CarMile')->nullable();
            $table->integer('CarSeat')->nullable();
            $table->string('type_fuel',10)->nullable();
            $table->string('CarLicense',20)->nullable();
            $table->string('CarRegister',15)->nullable();
            $table->string('CarEngineID',50)->nullable();
            $table->string('CarBodyID',50)->nullable();
            $table->string('CarInsurance',11)->nullable();
            $table->text('CarComment')->nullable();
            $table->tinyInteger('CarStatus')->nullable();
            $table->string('URL_pic',202)->nullable();
            $table->tinyInteger('CarIn01')->nullable();
            $table->tinyInteger('CarIn02')->nullable();
            $table->tinyInteger('CarIn03')->nullable();
            $table->tinyInteger('CarIn04')->nullable();
            $table->tinyInteger('CarIn05')->nullable();
            $table->tinyInteger('CarIn06')->nullable();
            $table->tinyInteger('CarIn07')->nullable();
            $table->tinyInteger('cert_pic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblcarinsoection2carcombine');
    }
}
