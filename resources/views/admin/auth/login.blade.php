@extends('layouts.master-without-nav')
@section('title')
    Login
@endsection
@section('content')
    <div class="auth-page">
        <div class="p-0 container-fluid">
            <div class="row g-0 d-flex justify-content-center">
                <div class="col-12 col-lg-4">
                    <div class="p-4 auth-full-page-content d-flex p-sm-5">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mt-5 text-center">
                                    <a href="{{ url('/') }}" class="mb-9">
                                        <img src="{{ URL::asset('assets/images/logo-2.png') }}" class="mb-2"
                                            height="50" alt="E-kavling PT.MGP">
                                    </a>
                                    <a href="{{ url('/') }}" class="d-block auth-logo">
                                        {{-- <span class="logo-txt">MODIS ✖ MEGUMI</span> --}}
                                        <span class="logo-txt">ADMIN E-KAVLING</span>
                                    </a>
                                </div>
                                <div class="my-auto auth-content">
                                    <div class="text-center">
                                        <h5 class="mb-0">Welcome Back !</h5>
                                        <p class="mt-2 text-muted">Sign in to continue to your e-kavling admin</p>
                                    </div>
                                    @if (Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <form class="pt-2 mt-4" action="{{ route('admin.login') }}" method="POST">
                                        @csrf
                                        <div class="mb-4 form-floating form-floating-custom">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" id="input-username"
                                                placeholder="Enter User Name" name="email" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-username">Username</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                        </div>

                                        <div class="mb-4 form-floating form-floating-custom auth-pass-inputgroup">
                                            <input type="password"
                                                class="form-control pe-5 @error('password') is-invalid @enderror"
                                                name="password" id="password-input" placeholder="Enter Password" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <button type="button" class="top-0 btn btn-link position-absolute h-100 end-0"
                                                id="password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="input-password">Password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary btn-rounded w-100 waves-effect waves-light"
                                                type="submit">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-4 text-center mt-md-5">
                                    <p class="mb-0">©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> E-kavling . Crafted with <i
                                            class="mdi mdi-heart text-danger"></i> by <a href=# target="_blank">PT.MGP
                                            Group</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/pages/pass-addon.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/feather-icon.init.js') }}"></script>
@endsection
