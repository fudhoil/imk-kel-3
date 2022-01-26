<!DOCTYPE html>
<html lang="en">

@extends('layouts.main')

@section('container')

<div class="container-fluid mt-5">
    <div class="d-flex flex-row-reverse bd-highlight">
        <button type="button" class="btn btn-sm btn-outline-secondary btn-success text-white" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="btn-tambah" aria-hidden="true">  
          <form action="/barang" method="post">
            @csrf
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="btn-tambah">Tambah</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                      <select class="form-select" aria-label="Default select example">
                        <option name="Baik" value="Baik">Baik</option>
                        <option name="Rusak" value="Rusak">Rusak</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="statusbarang" class="form-label">Status Barang</label>
                      <select class="form-select" name="status_barang" aria-label="Default select example">
                        <option name="status_barang" value="Terpinjam">Terpinjam</option>
                        <option name="status_barang" value="Tidak Terpinjam">Tidak Terpinjam</option>
                        <option name="status_barang" value="Dalam Perbaikan">Dalam Perbaikan</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        
    </div>
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
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">ID Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Type Barang</th>
            <th scope="col">Kondisi Barang</th>
            <th scope="col">Status Barang</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($barang as $index => $br)
                <tr>
                  <th scope="row">{{ $index +1 }}</th>
                  <td>{{ $br->id_barang }}</td>
                  <td>{{ $br->nama_barang }}</td>
                  <td>{{ $br->type_barang }}</td>
                  <td>{{ $br->kondisi_barang }}</td>
                  <td>{{ $br->status_barang }}</td>
                  <td>
                    <div class="btn-group me-2">
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#ubah">Ubah</button>
                      <div class="modal fade" id="ubah" tabindex="-1" aria-labelledby="btn-ubah" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="btn-ubah">Ubah Data Barang ID '{{ $br->id_barang }}'</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="namabarang" class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="namabarang" autofocus required value="{{ $br->nama_barang }}">
                                @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="typebarang" class="form-label">Type Barang</label>
                                  <input type="text" name="type_barang" class="form-control @error('type_barang') is-invalid @enderror" id="typebarang" required value="{{ $br->type_barang }}">
                                  @error('type_barang')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="kondisibarang" class="form-label">Kondisi Barang</label>
                                  <select class="form-select" name="kondisi_barang" aria-label="Default select example">
                                    <option name="baik" value="1" {{ ($br->kondisi_barang === "Baik") ? 'selected' : '' }}>Baik</option>
                                    <option name="rusak" value="2" {{ ($br->kondisi_barang === "Rusak") ? 'selected' : '' }}>Rusak</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="statusbarang" class="form-label">Status Barang</label>
                                  <select class="form-select" name="status_barang" aria-label="Default select example">
                                    <option name="terpinjam" value="1" {{ ($br->status_barang === "Terpinjam") ? 'selected' : '' }}>Terpinjam</option>
                                    <option name="tidakterpinjam" value="2" {{ ($br->status_barang === "Tidak Terpinjam") ? 'selected' : '' }}>Tidak Terpinjam</option>
                                    <option name="dalamperbaikan" value="3" {{ ($br->status_barang === "Dalam Perbaikan") ? 'selected' : '' }}>Dalam Perbaikan</option>
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="cancel">Batal</button>
                                <form action="/barang" method="post">
                                  @method('update')
                                  @csrf
                                <button type="submit" class="btn btn-danger">Simpan Perubahan</button>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>

                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus">Hapus</button>
                      <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="btn-hapus" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="btn-hapus">Yakin hapus data barang dengan ID '{{ $br->id_barang }}'</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="cancel">Batal</button>
                              <form action="/barang" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger ">Hapus</button>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
                  </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $barang->links() }}
    </div>
        
</div>
@endsection

</html>