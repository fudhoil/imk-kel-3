@extends('layouts.main')

@section('container')

<div class="container-fluid mt-1">
    
<div class="container">
    <h1>{{ $title }}</h1>
    <div class="d-flex justify-content-between flex-row-inverse bd-highlight mb-3">
        <form action="/peminjaman">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Cari.." name="search" value="{{ request('search') }}">
            <button data-bs-toggle="tooltip" data-bs-placement="top" title="Cari" class="btn bg-warning" type="submit"><i data-feather="search"></i></button>
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
                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Tutup" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                      {{-- @error('type_peminjaman')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror --}}
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
        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Tutup" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Tutup" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID Peminjaman</th>
          <th scope="col">ID Barang</th>
          <th scope="col">Nama Peminjam</th>
          <th scope="col">Tanggal Peminjaman</th>
          <th scope="col">Tanggal Pengembalian</th>
          <th scope="col">Status Peminjaman</th>
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
                <td>{{ $p->tgl_peminjaman }}</td>
                <td>{{ $p->tgl_pengembalian }}</td>
                <td> 
                  @if ($p->status_peminjaman=='Terpinjam') 
                  <span class="badge bg-warning py-1 px-3">{{ $p->status_peminjaman }}</span>    
                  @else
                  <span class="badge bg-primary py-1 px-3">{{ $p->status_peminjaman }}</span>    
                  @endif
                  </td>
                @auth
                <td>
                  <div class="btn-group me-1">
                  @if ($p->status_peminjaman=='Kembali')
                  <button type="submit" class="btn btn-outline-primary border-0" onclick="return confirm('Yakin ingin mengubah status peminjaman pada ID {{ $p->id }} menjadi KEMBALI')" disabled><i data-feather="check"></i></button>   
                  <form action="{{ route('peminjaman.destroy', ['peminjaman' => $p->id]) }}" method="post">
                    @csrf
                    @method('delete')
                  <button type="submit" class="btn btn-outline-danger border-0" onclick="return confirm('Yakin ingin menghapus data dengan ID {{ $p->id }}')"><i data-feather="trash"></i></button>
                  </form>
                  <button data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" type="submit" class="btn btn-outline-primary border-0" onclick="return confirm('Yakin ingin mengubah status peminjaman pada ID {{ $p->id }} menjadi KEMBALI')" disabled><i data-feather="check"></i></button>   
                  <button data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" type="submit" class="btn btn-outline-danger border-0" onclick="return confirm('Yakin ingin menghapus data dengan ID {{ $p->id }}')"><i data-feather="trash"></i></button>

                  @else
                    <form action="{{ url('peminjaman/update', $p->id ) }}" method="post">
                      @csrf
                      <button data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" type="submit" class="btn btn-outline-primary border-0" onclick="return confirm('Yakin ingin mengubah status peminjaman pada ID {{ $p->id }} menjadi KEMBALI')"><i data-feather="check"></i></button>   
                    </form>

                    <form action="{{ route('peminjaman.destroy', ['peminjaman' => $p->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" type="submit" class="btn btn-outline-danger border-0" onclick="return confirm('Yakin ingin menghapus data dengan ID {{ $p->id }}')" disabled><i data-feather="trash"></i></button>
                    </form>
                  
                  @endif
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