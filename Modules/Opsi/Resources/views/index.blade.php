@php
$segment = request()->segment(1);
@endphp
@extends('adminlte::page')


@section('title', env('APP_NAME').'::Opsi')

@section('content_header')
<h1 class="m-0 text-dark">Opsi</h1>
@stop

@section('content')

@include('opsi::filter')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6" style="text-align:left">
            Total Data : {{$data->total()}}
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
              <th>Opsi Group</th>
              <th>Opsi Detail</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $d)
            <tr>
              <td>
                <div class="btn-group"><button class="btn btn-default">Aksi</button><button class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"><span class="sr-only"></span>
                    <div class="dropdown-menu" role="menu">
                      <a href="route($uri . '.edit', $parameter['id']) . '" class="dropdown-item" rel="action" title="edit">
                        Edit
                      </a>
                      <a href="route($uri . '.destroy', $parameter['id']) . '" class="dropdown-item" rel="delete" title="delete">
                        Update
                      </a>
                    </div>
                  </button>


              </td>
              <td>{{ $d->name }}</td>
              <td>
                @php($values = $d->optionValues->mapWithKeys(function ($item) { return [$item['key'] => $item['value']]; }))
                {{ implode(', ', array_values($values->toArray())) }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix float-right">

        <div class="row">
          <div class="col-6">
            {{ $data->links() }}
          </div>
          <div class="col-6 text-right">
            <a href="{{route($segment.'.create')}}" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i>&nbsp; Tambah
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop