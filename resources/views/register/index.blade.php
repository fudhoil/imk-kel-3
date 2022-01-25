@extends('layouts.login')

@section('container')

<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <main class="form-registration">
            <form action="/register" method="post">
                @csrf
              <h1 class="h3 mb-3 fw-normal">Form Registrasi</h1>
              <div class="form-floating">
                <input type="text" name="nama" class="form-control rounded-top @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" required>
                <label for="nama">Nama</label>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                  <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required>
                  <label for="email">Email</label>
                  @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                  <input type="password" name="password" class="form-control rounded-bottom  @error('password') is-invalid @enderror" id="password" placeholder="Kata Sandi" required>
                  <label for="password">Kata Sandi</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Daftar</button>
            </form>
            <small class="d-block text-center mt-3">Sudah Terdaftar? <a href="/login">Login Here</a></small>
          </main>
    </div>
</div>
    
@endsection