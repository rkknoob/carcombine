@extends('layouts.app')
@section('title', 'รายละเอียดรถ')
@section('content')
@include('template.header', ['icon'=> 'icon-car2', 'name' => 'รายละเอียดรถ'])
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body border-top-info">
                <h6 class="mb-3 font-weight-semibold font f-22">
                    รายละเอียดรถ
                </h6>
                <div class="card">
                    <div class="card-body text-center">
                        <h6 class="font-weight-semibold mb-0 font f-22"> <strong> รหัส </strong> </h6>
                        <span class="d-block text-muted font f-20"> {{ $car->CarEvaID }} </span>
                        <h6 class="font-weight-semibold mb-0 font f-22 mt-2"> <strong> ทะเบียน </strong> </h6>
                        <span class="d-block text-muted font f-20"> {{ $car->CarLicense }} </span>
                    </div>
                </div>
                <div class="card card-body bg-light mb-0">
                    <dl class="row justify-content-md-center mb-0">
                        <dt class="col col-sm-2 font text-right">
                            <strong> Brand </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                            {{ $car->CarBrandName }}
                        </dd>
                        <dt class="col col-sm-2 font text-right">
                            <strong> Model </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                            {{ $car->CarBrandGenName }}
                        </dd>
                    </dl>
                    <dl class="row justify-content-md-center mb-0">
                        <dt class="col col-sm-2 font text-right">
                            <strong> Year </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                           {{ $car->CarYear }}
                        </dd>
                        <dt class="col col-sm-2 font text-right">
                            <strong> Engine </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                           {{ $car->CarEngine }}
                        </dd>
                    </dl>
                    <dl class="row justify-content-md-center mb-0">
                        <dt class="col col-sm-2 font text-right">
                            <strong> Color </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                            {{ $car->CarColorName }}
                        </dd>
                        <dt class="col col-sm-2 font text-right">
                            <strong> Mile </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                            {{ num($car->CarMile) }}
                        </dd>
                    </dl>
                    <dl class="row justify-content-md-center mb-0">
                        <dt class="col col-sm-2 font text-right">
                            <strong> Seat </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                            {{ $car->CarSeat }}
                        </dd>
                        <dt class="col col-sm-2 font text-right">
                            <strong> Fuel </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                            {{ $car->type_fuel }}
                        </dd>
                    </dl>
                    <dl class="row justify-content-md-center mb-0">
                        <dt class="col col-sm-2 font text-right">
                            <strong> Register </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                            {{ $car->CarRegister }}
                        </dd>
                        <dt class="col col-sm-2 font text-right">
                            <strong> Insurance </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                            {{ $car->CarInsurance }}
                        </dd>
                    </dl>
                    <dl class="row justify-content-md-center mb-0">
                        <dt class="col col-sm-2 font text-right">
                            <strong> EngineID </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                            {{ $car->CarEngineID }}
                        </dd>
                        <dt class="col col-sm-2 font text-right">
                            <strong> CarBodyID </strong>
                        </dt>
                        <dd class="col-sm-2 font">
                            {{ $car->CarBodyID }}
                        </dd>
                    </dl>
                </div>
                <div class="card card-body bg-light mt-3">
                    <dl class="row mb-0">
                        <dt class="col col-sm-3 font text-left">
                            <strong> Comment From Car Inspectors </strong>
                        </dt>
                        <dd class="col-sm-12 mt-2 pa-2" style="text-indent: 1.5em !important;">
                            {{ $car->CarComment }}
                        </dd>
                    </dl>
                </div>
                <div class="card card-body bg-light mt-3">
                    <dl class="row mb-3 mt-2">
                        <dt class="col col-sm-12 font text-left">
                            <strong> การประเมินภาพรวมของรถ </strong>
                        </dt>
                        @if($car->CarIn01 == 0)
                        <dd class="col-sm-6 mt-3 pa-2">
                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
                                        <i class="icon-checkmark3"></i>
                                    </a>
                                </div>
                                <div class="media-body mt-2 font">
                                    ไมค์แท้
                                </div>
                            </li>
                        </dd>
                        @endif
                        @if($car->CarIn02 == 0)
                        <dd class="col-sm-6 mt-3 pa-2">
                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
                                        <i class="icon-checkmark3"></i>
                                    </a>
                                </div>
                                <div class="media-body mt-2 font">
                                    รถไม่เคยประสบภัยน้ำท่วม
                                </div>
                            </li>
                        </dd>
                        @endif
                        @if($car->CarIn03 == 0)
                        <dd class="col-sm-6 mt-3 pa-2">
                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
                                        <i class="icon-checkmark3"></i>
                                    </a>
                                </div>
                                <div class="media-body mt-2 font">
                                    รถไม่เคยประสบไฟไหม้
                                </div>
                            </li>
                        </dd>
                        @endif
                        @if($car->CarIn04 == 0)
                        <dd class="col-sm-6 mt-3 pa-2">
                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
                                        <i class="icon-checkmark3"></i>
                                    </a>
                                </div>
                                <div class="media-body mt-2 font">
                                    รถไม่เคยเกิดอุบัติเหตุรุนแรงชนหนัก
                                </div>
                            </li>
                        </dd>
                        @endif
                        @if($car->CarIn05 == 0)
                        <dd class="col-sm-6 mt-3 pa-2">
                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
                                        <i class="icon-checkmark3"></i>
                                    </a>
                                </div>
                                <div class="media-body mt-2 font">
                                    รถเลขเครื่องตรง
                                </div>
                            </li>
                        </dd>
                        @endif
                        @if($car->CarIn06 == 0)
                        <dd class="col-sm-6 mt-3 pa-2">
                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
                                        <i class="icon-checkmark3"></i>
                                    </a>
                                </div>
                                <div class="media-body mt-2 font">
                                    รถเลขตัวถังตรง
                                </div>
                            </li>
                        </dd>
                        @endif
                        @if($car->CarIn07 == 0)
                        <dd class="col-sm-6 mt-3 pa-2">
                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
                                        <i class="icon-checkmark3"></i>
                                    </a>
                                </div>
                                <div class="media-body mt-2 font">
                                    รถสภาพสีเดิม
                                </div>
                            </li>
                        </dd>
                        @endif
                    </dl>
                </div>

                <div class="card card-body bg-light mt-3">
                    <dl class="row mb-0">
                        <dt class="col col-sm-3 font text-left">
                            <strong> รูปภาพประกอบ </strong>
                        </dt>
                        <dd class="col-sm-12 mt-3 pa-2">
                            <div class="row">
                                @foreach($car->details as $item)
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-img-actions m-1">
                                            <img class="card-img img-fluid" src="{{ $item->URL_pic }}" alt="">
                                            <div class="card-img-actions-overlay card-img">
                                                <a href="{{ $item->URL_pic }}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-fancybox="images">
                                                    <i class="icon-enlarge7"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach;
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
