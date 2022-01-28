@extends('layouts.main')

@section('container')

<div class="container-fluid mt-1">
    
<div class="conntainer">
    <div class="d-flex justify-content-between flex-row-inverse bd-highlight mb-3">
        <form action="/peminjaman">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Cari.." name="search" value="{{ request('search') }}">
            <button class="btn bg-warning" type="submit"><i data-feather="search"></i></button>
          </div>
        </form>
    <button type="button" class="btn btn-sm btn-outline-secondary btn-success text-white" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="btn-tambah" aria-hidden="true">  
        <form action="/peminjaman" method="post">
          @csrf
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="btn-tambah">Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="mb-3">
                    <label for="namapeminjam" class="form-label">Nama peminjam</label>
                    <input type="text" name="nama_peminjam" class="form-control" id="namapeminjam" autofocus required value="{{ old('nama_peminjam') }}">
                    @error('nama_peminjam')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="idbarang" class="form-label">ID Barang</label>
                      <input type="text" name="id_barang" class="form-control " id="id_peminjaman" required value="{{ old('nama_peminjam') }}">
                    </div>
                    <div class="mb-3">
                      <label for="tglpeminjaman" class="form-label">Tanggal peminjaman</label>
                      <input type="date" name="tgl_peminjaman" class="form-control " id="tglpeminjaman" required value="{{ now() }}">
                      @error('type_peminjaman')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </div>
            </div>
          </form>
        </div> 
  </div>
</div>
        
</div>

@endsection