@extends('layouts.app')
@section('title', 'Profile | โปรไฟล์')
@section('content')
@include('template.header', ['icon'=> 'icon-user', 'name' => 'โปรไฟล์'])
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body border-top-info">
                <h6 class="mb-3 font-weight-semibold font f-22">
                    รายละเอียดผู้ดูแลระบบ
                </h6>
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            <img src="/images/user.png" alt="" class="rounded" width="150" height="140">
                        </div>
                        <h6 class="font-weight-semibold mb-0 font f-22">
                            <strong> ผู้ดูแลระบบ </strong>
                        </h6>
                        <span class="d-block text-muted font f-20"> {{ Auth::user()->name }} </span>
                    </div>
                </div>
                <div class="card card-body bg-light mb-0">
                    <dl class="row justify-content-md-center mb-0">
                        <dt class="col col-sm-3 font text-right">
                            <strong> ชื่อเข้าสู่ระบบ </strong>
                        </dt>
                        <dd class="col-sm-3">
                            {{ Auth::user()->username }}
                        </dd>
                    </dl>
                </div>
                <br>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline bg-slate-600 text-slate-600 border-slate font"> แก้ไขโปรไฟล์ </a>
            </div>
        </div>
    </div>
</div>
@endsection
