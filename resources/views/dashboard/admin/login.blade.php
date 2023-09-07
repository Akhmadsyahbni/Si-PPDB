@extends('layouts.dashboard')
@section('content')
<main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                {{-- <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a> --}}
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Halaman Admin Login</h5>
                    <p class="text-center small">Input username & password</p>
                  </div>

                  <form action="{{route('admin.check')}}" method="post" autocomplete="off"class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="youremail" value="{{old('email')}}" required>
                        <div class="invalid-feedback">@error('email'){{$message}}@enderror</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" value="{{old('password')}}" required>
                      <div class="invalid-feedback">@error('password'){{$message}}@enderror</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Belum punya akun? <a href="{{route('user.register')}}">Silahkan Daftar!</a></p>
                    </div>
                    <div class="col-12">
                        <p class="small mb-0">Lupa kata sandi? <a href="{{route('user.register')}}">Reset kata sandi!</a></p>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
</main><!-- End #main -->
@endsection