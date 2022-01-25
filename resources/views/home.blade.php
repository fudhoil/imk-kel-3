<!DOCTYPE html>
<html lang="en">

@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
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
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
  </div>


  <canvas class="my-4 w-100" id="myChart" width="900" height="380">
      
  </canvas>

  <h2>Section title</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Header</th>
          <th scope="col">Header</th>
          <th scope="col">Header</th>
          <th scope="col">Header</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1,001</td>
          <td>random</td>
          <td>data</td>
          <td>placeholder</td>
          <td>text</td>
        </tr>
        <tr>
          <td>1,002</td>
          <td>placeholder</td>
          <td>irrelevant</td>
          <td>visual</td>
          <td>layout</td>
        </tr>
        <tr>
          <td>1,003</td>
          <td>data</td>
          <td>rich</td>
          <td>Welcome</td>
          <td>tabular</td>
        </tr>
        <tr>
          <td>1,003</td>
          <td>information</td>
          <td>placeholder</td>
          <td>illustrative</td>
          <td>data</td>
        </tr>
        <tr>
          <td>1,004</td>
          <td>text</td>
          <td>random</td>
          <td>layout</td>
          <td>Welcome</td>
        </tr>
        <tr>
          <td>1,005</td>
          <td>Welcome</td>
          <td>irrelevant</td>
          <td>text</td>
          <td>placeholder</td>
        </tr>
        <tr>
          <td>1,006</td>
          <td>Welcome</td>
          <td>illustrative</td>
          <td>rich</td>
          <td>data</td>
        </tr>
        <tr>
          <td>1,007</td>
          <td>placeholder</td>
          <td>tabular</td>
          <td>information</td>
          <td>irrelevant</td>
        </tr>
        <tr>
          <td>1,008</td>
          <td>random</td>
          <td>data</td>
          <td>placeholder</td>
          <td>text</td>
        </tr>
        <tr>
          <td>1,009</td>
          <td>placeholder</td>
          <td>irrelevant</td>
          <td>visual</td>
          <td>layout</td>
        </tr>
        <tr>
          <td>1,010</td>
          <td>data</td>
          <td>rich</td>
          <td>Welcome</td>
          <td>tabular</td>
        </tr>
        <tr>
          <td>1,011</td>
          <td>information</td>
          <td>placeholder</td>
          <td>illustrative</td>
          <td>data</td>
        </tr>
        <tr>
          <td>1,012</td>
          <td>text</td>
          <td>placeholder</td>
          <td>layout</td>
          <td>Welcome</td>
        </tr>
        <tr>
          <td>1,013</td>
          <td>Welcome</td>
          <td>irrelevant</td>
          <td>text</td>
          <td>visual</td>
        </tr>
        <tr>
          <td>1,014</td>
          <td>Welcome</td>
          <td>illustrative</td>
          <td>rich</td>
          <td>data</td>
        </tr>
        <tr>
          <td>1,015</td>
          <td>random</td>
          <td>tabular</td>
          <td>information</td>
          <td>text</td>
        </tr>
      </tbody>
    </table>
  </div>

@endsection
 
</html>