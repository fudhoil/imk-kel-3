<!DOCTYPE html>
<html lang="en">

@extends('layouts.main')

@section('container')

<div class="container-fluid mt-1">
    <div class="d-flex justify-content-between flex-row-inverse bd-highlight mb-3">
          <form action="/barang">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Cari.." name="search" value="{{ request('search') }}">
              <button class="btn bg-warning" type="submit"><i data-feather="search"></i></button>
            </div>
          </form>
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
                      <input type="text" name="type_barang" class="form-control @error('type_barang') is-invalid @enderror" id="typebarang" required value="{{ old('type_barang') }}"">
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
                      <select class="form-select" name="status_barang">
                        <option name="status_barang" value="Terpinjam">Terpinjam</option>
                        <option name="status_barang" value="Tidak Terpinjam" selected>Tidak Terpinjam</option>
                        <option name="status_barang" value="Dalam Perbaikan">Dalam Perbaikan</option>
                      </select>
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
            @auth
            <th scope="col">Tindakan</th>
            @endauth
          </tr>
        </thead>
        <tbody>
          @foreach ($barang as $key => $br)
          <tr>
            <th scope="row">{{ $barang->firstItem() + $key }}</th>
                  <td>{{ $br->id }}</td>
                  <td>{{ $br->nama_barang }}</td>
                  <td>{{ $br->type_barang }}</td>
                  <td class=""> 
                  @if ($br->kondisi_barang=='Baik') 
                  <span class="badge bg-primary py-1 px-3">{{ $br->kondisi_barang }}</span>    
                  @else
                  <span class="badge bg-danger py-1 px-3">{{ $br->kondisi_barang }}</span>    
                  @endif
                  </td>
                  <td>
                  @if ($br->status_barang=='Terpinjam') 
                    <span class="badge bg-warning py-1 px-3">{{ $br->status_barang }}</span>    
                  @elseif ($br->status_barang=='Tidak Terpinjam')
                    <span class="badge bg-primary py-1 px-3">{{ $br->status_barang }}</span> 
                    @else
                    <span class="badge bg-danger py-1 px-3">{{ $br->status_barang }}</span> 
                    @endif  
                  </td>
                  @auth
                  <td>
                    <div class="btn-group me-1">
                      <button type="button" class="btn btn-outline-secondary border-0 rounded" data-bs-toggle="modal" data-barang={{ $br->id }} data-bs-target="#Ubah-{{ $br->id }}">
                        <i data-feather="edit"></i>
                      </button>
                      <form action="{{ url('barang/update', $br->id ) }}" method="post">
                        @csrf
                        <div class="modal fade" id="Ubah-{{ $br->id }}" tabindex="-1" aria-labelledby="btn-Ubah" aria-hidden="true">  
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="btn-Ubah">Ubah {{ $br->id }}</h5>
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
                                      <input type="text" name="type_barang" class="form-control @error('type_barang') is-invalid @enderror" id="typebarang" required value="{{ $br->type_barang }}"">
                                      @error('type_barang')
                                          <div class="invalid-feedback">
                                              {{ $message }}
                                          </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Ubahkan</button>
                                  </div>
                              </div>
                              </div>
                            </form>
                          </div>

                      <form action="{{ route('barang.destroy', ['barang' => $br->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger border-0" onclick="return confirm('Yakin ingin menghapus data dengan ID {{ $br->id }}')"><i data-feather="trash"></i></button>
                      </form>
                    </div>
                  </td>
                  @endauth
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