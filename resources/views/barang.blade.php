<!DOCTYPE html>
<html lang="en">

@extends('layouts.main')

@section('container')

<div class="container-fluid mt-5">
    <div class="d-flex flex-row-reverse bd-highlight">
        <button type="button" class="btn btn-sm btn-outline-secondary btn-success text-white" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="btn-tambah" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="btn-tambah">Tambah</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="tambah">Close</button>
                  <button type="button" class="btn btn-danger">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        
    </div>

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
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#tambah">Ubah</button>
                        <div class="modal fade" id="ubah" tabindex="-1" aria-labelledby="btn-ubah" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="btn-tambah">Tambah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                ...
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="ubah">Close</button>
                                <button type="button" class="btn btn-danger">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary btn-danger text-white">Hapus</button>
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