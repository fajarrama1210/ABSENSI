@extends('layouts.app1')
@section('title')
    Register PresensiX
@endsection
@section('content')
    <!--  Body Wrapper -->
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed"
        data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-4 col-xxl-4">
                        <a href="Javascript:void(0)" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg"
                                width="180" alt="8%">
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center"
                            style="height: calc(100vh - 80px);">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg"
                                alt="" class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-8 col-xxl-8">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="col-sm-8 col-md-7 col-xl-9">
                                <h1>Selamat Datang Di PresensiX</h1>
                                <div class="wizard-content">
                                    <h4 class="mb-0">Registrasi</h4>
                                    <h6 class="mb-3"></h6>
                                    <form id="form-register" enctype="multipart/form-data" class="">
                                        <!-- Step 1 -->
                                        <section>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="name">Nama</label>
                                                        <span class="important">*</span>
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" />
                                                        <ul class="error-text"></ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="NISN">NISN</label>
                                                        <span class="important">*</span>
                                                        <input type="text" name="NISN" class="form-control"
                                                            id="NISN" />
                                                        <ul class="error-text"></ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="class">Kelas</label>
                                                        <span class="important">*</span>
                                                        <input type="text" name="class" class="form-control"
                                                            id="class" />
                                                        <ul class="error-text"></ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="major">Jurusan</label>
                                                        <span class="important">*</span>
                                                        <input type="text" name="major" class="form-control"
                                                            id="major" />
                                                        <ul class="error-text"></ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="email">Email</label>
                                                        <span class="important">*</span>
                                                        <input type="email" name="email" class="form-control"
                                                            id="email" />
                                                        <ul class="error-text"></ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="password">Password</label>
                                                        <span class="important">*</span>
                                                        <input type="password" name="password" class="form-control"
                                                            id="password" />
                                                        <ul class="error-text"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <div class="form-check">
                                                    <input class="form-check-input primary" type="checkbox" value=""
                                                        id="flexCheckChecked">
                                                    <label class="form-check-label text-dark" for="flexCheckChecked">
                                                        Tampilkan Password
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="logo" class="d-flex align-items-center">
                                                            <span class="mr-5" style="margin-right: 2%">Logo</span>
                                                            <a href="javascript:void(0)" class="ml-2 "
                                                                data-toggle="tooltip"
                                                                title="Logo maksimal 5MB dan extensi harus jpg,jpeg atau png">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="bg-primary"
                                                                    style="border-radius: 50%" width="20"
                                                                    height="20" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="#ffffff"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M12 8v4m0 4h.01" />
                                                                </svg>
                                                            </a>
                                                        </label>
                                                        <input type="file" class="form-control" name="photo"
                                                            id="photo" />
                                                        <ul class="error-text"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </form>
                                    <a href="{{ route('login') }}"> Sudah Punya akun?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('flexCheckChecked').addEventListener('change', function() {
            var passwordInput = document.getElementById('password');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
@endsection
