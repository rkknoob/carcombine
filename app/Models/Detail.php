<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table      = 'tblcarinsoection2carcombine';
    protected $guarded    = [];
    public $timestamps    = false;

    // protected $primaryKey = 'CarEvaID';
    protected $hidden = [
        'Dealer_Name',
        'CarBrandName',
        'CarBrandGenName',
        'CarRegisterDate',
        'CarYear',
        'CarGearID',
        'CarColorName',
        'CarEngine',
        'CarOwnerAmount',
        'CarMile',
        'CarSeat',
        'type_fuel',
        'CarLicense',
        'CarRegister',
        'CarEngineID',
        'CarBodyID',
        'CarInsurance',
        'CarComment',
        'CarStatus',
        'CarIn01',
        'CarIn02',
        'CarIn03',
        'CarIn04',
        'CarIn05',
        'CarIn06',
        'CarIn07',
    ];
}
