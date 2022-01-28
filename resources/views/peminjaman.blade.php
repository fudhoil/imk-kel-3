<!DOCTYPE html>
<html lang="en">

@extends('layouts.main')

@section('container')

<div class="container-fluid mt-1">
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
                      <label for="namapeminjaman" class="form-label">Nama peminjaman</label>
                      <input type="text" name="nama_peminjaman" class="form-control @error('nama_peminjaman') is-invalid @enderror" id="namapeminjaman" autofocus required value="{{ old('nama_peminjaman') }}">
                      @error('nama_peminjaman')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="typepeminjaman" class="form-label">Type peminjaman</label>
                      <input type="text" name="type_peminjaman" class="form-control @error('type_peminjaman') is-invalid @enderror" id="typepeminjaman" required value="{{ old('type_peminjaman') }}"">
                      @error('type_peminjaman')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="kondisipeminjaman" class="form-label">Kondisi peminjaman</label>
                      <select name="kondisi_peminjaman" class="form-control">
                        <option name="kondisi_peminjaman" value="Baik">Baik</option>
                        <option name="kondisi_peminjaman" value="Rusak">Rusak</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="statuspeminjaman" class="form-label">Status peminjaman</label>
                      <select class="form-select" name="status_peminjaman">
                        <option name="status_peminjaman" value="Terpinjam">Terpinjam</option>
                        <option name="status_peminjaman" value="Tidak Terpinjam" selected>Tidak Terpinjam</option>
                        <option name="status_peminjaman" value="Dalam Perbaikan">Dalam Perbaikan</option>
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
            <th scope="col">ID peminjaman</th>
            <th scope="col">Nama peminjaman</th>
            <th scope="col">Type peminjaman</th>
            <th scope="col">Kondisi peminjaman</th>
            <th scope="col">Status peminjaman</th>
            @auth
            <th scope="col">Tindakan</th>
            @endauth
          </tr>
        </thead>
        <tbody>
          @foreach ($peminjaman as $key => $br)
          <tr>
            <th scope="row">{{ $peminjaman->firstItem() + $key }}</th>
                  <td>{{ $br->id }}</td>
                  <td>{{ $br->nama_peminjaman }}</td>
                  <td>{{ $br->type_peminjaman }}</td>
                  <td class=""> 
                  @if ($br->kondisi_peminjaman=='Baik') 
                  <span class="badge bg-primary py-1 px-3">{{ $br->kondisi_peminjaman }}</span>    
                  @else
                  <span class="badge bg-danger py-1 px-3">{{ $br->kondisi_peminjaman }}</span>    
                  @endif
                  </td>
                  <td>
                  @if ($br->status_peminjaman=='Terpinjam') 
                    <span class="badge bg-warning py-1 px-3">{{ $br->status_peminjaman }}</span>    
                  @elseif ($br->status_peminjaman=='Tidak Terpinjam')
                    <span class="badge bg-primary py-1 px-3">{{ $br->status_peminjaman }}</span> 
                    @else
                    <span class="badge bg-danger py-1 px-3">{{ $br->status_peminjaman }}</span> 
                    @endif  
                  </td>
                  @auth
                  <td>
                    <div class="btn-group me-1">
                      <button type="button" class="btn btn-outline-secondary border-0 rounded" data-bs-toggle="modal" data-peminjaman={{ $br->id }} data-bs-target="#Ubah-{{ $br->id }}">
                        <i data-feather="edit"></i>
                      </button>
                      <form action="{{ url('peminjaman/update', $br->id ) }}" method="post">
                        @csrf
                        <div class="modal fade" id="Ubah-{{ $br->id }}" tabindex="-1" aria-labelledby="btn-Ubah" aria-hidden="true">  
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="btn-Ubah">Ubah Detail ID {{ $br->id }}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                      <label for="namapeminjaman" class="form-label">Nama peminjaman</label>
                                      <input type="text" name="nama_peminjaman" class="form-control @error('nama_peminjaman') is-invalid @enderror" id="namapeminjaman" autofocus required value="{{ $br->nama_peminjaman }}">
                                      @error('nama_peminjaman')
                                          <div class="invalid-feedback">
                                              {{ $message }}
                                          </div>
                                      @enderror
                                    </div>
                                    <div class="mb-3">
                                      <label for="typepeminjaman" class="form-label">Type peminjaman</label>
                                      <input type="text" name="type_peminjaman" class="form-control @error('type_peminjaman') is-invalid @enderror" id="typepeminjaman" required value="{{ $br->type_peminjaman }}"">
                                      @error('type_peminjaman')
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

                      <form action="{{ route('peminjaman.destroy', ['peminjaman' => $br->id]) }}" method="post">
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
        {{ $peminjaman->links() }}
    </div>
        
</div>

@endsection
 
</html>