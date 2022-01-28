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

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID Peminjaman</th>
          <th scope="col">ID Barang</th>
          <th scope="col">Nama Peminjam</th>
          <th scope="col">Status Peminjaman</th>
          <th scope="col">Status Barang</th>
          @auth
          <th scope="col">Tindakan</th>
          @endauth
        </tr>
      </thead>
      <tbody>
        @foreach ($peminjaman as $key => $p)
        <tr>
          <th scope="row">{{ $peminjaman->firstItem() + $key }}</th>
                <td>{{ $p->id }}</td>
                <td>{{ $p->id_barang }}</td>
                <td>{{ $p->nama_peminjam }}</td>
                <td> 
                @if ($p->status_peminjaman=='Terpinjam') 
                <span class="badge bg-warning py-1 px-3">{{ $p->status_peminjaman }}</span>    
                @else
                <span class="badge bg-primary py-1 px-3">{{ $p->status_peminjaman }}</span>    
                @endif
                </td>
                <td>
                @if ($p->status_barang=='Terpinjam') 
                  <span class="badge bg-warning py-1 px-3">{{ $p->status_barang }}</span>    
                @elseif ($p->status_barang=='Tidak Terpinjam')
                  <span class="badge bg-primary py-1 px-3">{{ $p->status_barang }}</span> 
                  @else
                  <span class="badge bg-danger py-1 px-3">{{ $p->status_barang }}</span> 
                  @endif  
                </td>
                @auth
                <td>
                  <div class="btn-group me-1">
                    <button type="button" class="btn btn-outline-secondary border-0 rounded" data-bs-toggle="modal" data-barang={{ $p->id }} data-bs-target="#Ubah-{{ $p->id }}">
                      <i data-feather="edit"></i>
                    </button>
                    <form action="{{ url('barang/update', $p->id ) }}" method="post">
                      @csrf
                      <div class="modal fade" id="Ubah-{{ $p->id }}" tabindex="-1" aria-labelledby="btn-Ubah" aria-hidden="true">  
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="btn-Ubah">Ubah Detail ID {{ $p->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <div class="mb-3">
                                    <label for="namabarang" class="form-label">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="namabarang" autofocus required value="{{ $p->nama_barang }}">
                                    @error('nama_barang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="typebarang" class="form-label">Type Barang</label>
                                    <input type="text" name="type_barang" class="form-control @error('type_barang') is-invalid @enderror" id="typebarang" required value="{{ $p->type_barang }}"">
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

                    <form action="{{ route('barang.destroy', ['barang' => $p->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-outline-danger border-0" onclick="return confirm('Yakin ingin menghapus data dengan ID {{ $p->id }}')"><i data-feather="trash"></i></button>
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