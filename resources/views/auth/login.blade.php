@extends('layouts.app')
@section('title', 'Login | CARCOMBINED')
@section('login')
<div class="content d-flex justify-content-center align-items-center login-cover">
    <div class="content-wrapper">
        <div class="content d-flex justify-content-center align-items-center">
            <form action="{{ route('login') }}" class="login-form" id="FormValidation" method="POST">
            @csrf
            @if($errors->any())
            <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                <p class="font fs-20">{!! $error !!}</p>
                @endforeach
            </div>
            @endif
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="/images/logo.png" alt="" class="img-fluid mb-2" width="35%">
                        <h5 class="mb-0" >LOGIN TO CARCOMBINED </h5>
                        <span class="d-block text-muted"> Enter your credentials below </span>
                    </div>
                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    </div>
                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Login <i class="icon-circle-right2 ml-2"></i> </button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(e) {
        const form = document.getElementById('FormValidation');
        FormValidation.formValidation(form, {
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'กรุณากรอกชื่อผู้ใช้งาน'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'กรุณากรอกพาสเวิร์ด'
                        }
                    }
                }
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
