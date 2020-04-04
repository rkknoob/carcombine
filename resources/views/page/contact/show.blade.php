@extends('layouts.app')
@section('title', 'รายละเอียดการติดต่อ')
@section('content')
@include('template.header', ['icon'=> 'icon-list', 'name' => 'รายละเอียดการติดต่อ'])
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body border-top-info">
                <h6 class="mb-3 font-weight-semibold font f-22">
                    รายละเอียดการติดต่อ
                </h6>
                <div class="card">
                    <div class="card-body text-center">
                        <h6 class="font-weight-semibold mb-0 font f-22"> <strong> ชื่อ </strong> </h6>
                        <span class="d-block text-muted font f-20"> {{ $item->first_name }}
                            {{ $item->last_name }}</span>
                    </div>
                </div>
                <div class="card card-body bg-light mb-0">
                    <dl class="row justify-content-md-center mb-0">
                        <dt class="col col-sm-3 font text-right">
                            <strong> อีเมล์ </strong>
                        </dt>
                        <dd class="col-sm-3">
                            {{ $item->email }}
                        </dd>
                    </dl>
                    <dl class="row justify-content-md-center mb-0">
                        <dt class="col col-sm-3 font text-right">
                            <strong> เบอร์โทร </strong>
                        </dt>
                        <dd class="col-sm-3">
                            {{ $item->tel }}
                        </dd>
                    </dl>
                    <dl class="row justify-content-md-center mb-0">
                        <dt class="col col-sm-3 font text-right">
                            <strong> จำนวน </strong>
                        </dt>
                        <dd class="col-sm-3">
                            ฟหก
                        </dd>
                    </dl>
                </div>
                <div class="card card-body bg-light mt-4">
                    <dl class="row mb-0">
                        <dt class="col col-sm-3 font text-left">
                            <strong> รายละเอียดที่ติดต่อ </strong>
                        </dt>
                        <dd class="col-sm-12 mt-2 pa-2">
                            {{ $item->detail }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
