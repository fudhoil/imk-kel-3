@extends('layouts.login')

@section('container')

<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <main class="form-signin">
          @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if (session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
            <form action="/login" method="post">
              @csrf
              <h1 class="h3 mb-3 fw-normal">Silahkan Masuk</h1>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required>
                <label for="emai;">Alamat Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Kata Sandi</label> 
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
            </form>
            <small class="d-block text-center mt-3">Belum terdaftar? <a href="/register">Daftar Sekarang!</a></small>
          </main>
    </div>
</div>
    
@endsection