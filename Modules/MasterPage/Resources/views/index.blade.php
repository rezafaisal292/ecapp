@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Master Page</h1>
@stop

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6" style="text-align:left">
            <h5>List Data</h5>
          </div>
          <div class="col-md-6" style="text-align:right">
            <button type="submit" class="btn btn-success btn-sm">
              <i class="fas fa-file-excel"></i>&nbsp; Export XLS
            </button>
            &nbsp;
            <button type="submit" class="btn btn-danger btn-sm">
              <i class="fas fa-file-excel"></i>&nbsp; Export PDF
            </button>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>Aksi</th>
              <th>Nama</th>
              <th>URL</th>
              <th>Icon</th>
              <th>Urutan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $d)
            <tr>
              <td></td>
              <td>{{$d->nama}}</td>
              <td>{{$d->url}}</td>
              <td><i class="{{$d->icon}}"></i></td>
              <td>{{$d->urutan}}</td>
              <td>{{$d->status}}</td>
            </tr>
            @if(count($d->childPage)>0)
            @foreach($d->childPage as $cp)
            <tr>
              <td></td>
              <td style="text-align:center">{{$cp->nama}}</td>
              <td style="text-align:center">{{$cp->url}}</td>
              <td><i class="{{$cp->icon}}"></i></td>
              <td>{{$cp->urutan}}</td>
              <td>{{$cp->status}}</td>
            </tr>
            @endforeach
            @endif
            @endforeach

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
@stop