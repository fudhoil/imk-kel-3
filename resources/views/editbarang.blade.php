@extends('layouts.edit')

@section('container')
<div class="row justify-content-center mt-5">
<div class="col-md-4">
    <main class="form-edit">
        <form action="/login" method="post">
          @csrf
          <h1 class="h3 mb-3 fw-normal">Edit data</h1>
          <div class="form-floating">
            <input type="text" name="namabarang" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Contoh: Sony A20" autofocus required>
            <label for="nama_barang;">ok</label>
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