@extends('layouts.app1')

@section('content')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
          <div class="position-relative z-index-5">
            <div class="row">
              <div class="col-xl-7 col-xxl-8">
                <a href="index-2.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                  <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                  <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
                </div>
              </div>
              <div class="col-xl-5 col-xxl-4">
                <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                  <div div class="col-sm-8 col-md-6 col-xl-9">
                    <h2 class="mb-3 fs-7 fw-bolder">Selamat Datang PresensiX</h2>
                    <p class=" mb-9">Revolusi Presensi: Efisiensi dan Kelengkapan dalam Genggaman Anda!</p>
                    <form>
                      <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Emai" aria-describedby="emailHelp" placeholder="Masukkan Email Anda">
                      </div>
                      <div class="mb-4">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="InputPassword" placeholder="Masukkan">
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                          <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked">
                          <label class="form-check-label text-dark" for="flexCheckChecked">
                            Tampilkan Password
                          </label>
                        </div>
                      </div>
                      <a href="index-2.html" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</a>
                      <div class="d-flex align-items-center justify-content-center">
                        <p class="fs-4 mb-0 fw-medium">Belum mempunyai Akun?</p>
                        <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Buat</a>
                      </div>
                    </form>
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
      var passwordInput = document.getElementById('InputPassword');
      if (this.checked) {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    });
  </script>
@endsection
