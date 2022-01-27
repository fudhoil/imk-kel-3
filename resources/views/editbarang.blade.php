@extends('layouts.edit')
@section('container')
<div class="container-fluid">
  <form action="{{ route('barang.update', ['barang' => $barang->id]) }}" method="post">
      <div class="mb-3">
        <label for="namabarang" class="form-label">Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="namabarang" autofocus required value="{{ old('nama_barang') }}">
        @error('nama_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="typebarang" class="form-label">Type Barang</label>
        <input type="text" name="type_barang" class="form-control @error('type_barang') is-invalid @enderror" id="typebarang" required {{ old('type_barang') }}>
        @error('type_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kondisibarang" class="form-label">Kondisi Barang</label>
        <select name="kondisi_barang" class="form-control">
          <option name="kondisi_barang" value="Baik">Baik</option>
          <option name="kondisi_barang" value="Rusak">Rusak</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="statusbarang" class="form-label">Status Barang</label>
        <input type="text" class="form-control" value="{{ $barang->status_barang }}" disabled>
      </div>
  </form>
</div>
@endsection