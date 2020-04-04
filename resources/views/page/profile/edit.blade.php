@extends('layouts.app')
@section('title', 'แก้ไขโปรไฟล์')
@section('content')
@include('template.header', ['icon'=>'icon-user','name' => 'แก้ไขโปรไฟล์'])
<div class="content">
    <form action="{{ route('profile.update') }}" method="POST" id="FormValidation">
        @method('PUT')
        @csrf
        @include('template.pattern.errors', ['errors' => $errors])
        <div class="card">
            <div class="card-body">
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-weight-bold font">
                        รายละเอียดโปรไฟล์
                        <span class="float-right">
                            <img src="/images/user.png" alt="" class="rounded" width="60" height="55" id="photo">
                        </span>
                    </legend>
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-lg-2 font">ชื่อ</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-form-label col-lg-2 font">ชื่อเข้าสู่ระบบ</label>
                        <div class="col-lg-10">
                            <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-weight-bold font"> รหัสผ่าน </legend>
                    <div class="form-group row">
                        <label for="old_password" class="col-form-label col-lg-2 font">รหัสผ่านเดิม</label>
                        <div class="col-lg-10">
                            <input type="text" name="old_password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-form-label col-lg-2 font">รหัสผ่านใหม่</label>
                        <div class="col-lg-10">
                            <input type="text" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-form-label col-lg-2 font">ยืนยันรหัสผ่าน</label>
                        <div class="col-lg-10">
                            <input type="text" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary font"> บันทึก <i class="icon-paperplane ml-2"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(e) {
        const form = document.getElementById('FormValidation');
        FormValidation.formValidation(form, {
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'กรุณากรอกชื่อ'
                        }
                    }
                },
                username: {
                    validators: {
                        notEmpty: {
                            message: 'กรุณากรอกชื่อผู้ใช้งาน'
                        },
                        stringLength: {
                            min: 5,
                            max: 30,
                            message: 'กรุณากรอกตัวอักษรระหว่าง 5 ถึง 30 ตัวอักษร'
                        }
                    }
                },
                password_confirmation: {
                    validators: {
                        identical: {
                            compare: function() {
                                return form.querySelector('[name="password"]').value;
                            },
                            message: 'พาสเวิร์ดยืนยันไม่ตรงกัน'
                        }
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
            },
        });
    });
</script>
@endpush
