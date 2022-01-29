@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Opsi</h1>
@stop

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6" style="text-align:left">
            <h5>Pencarian</h5>
          </div>

        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6" style="text-align:left">
            <b>List Data</b>
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
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $d)
            <tr>
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
      <div class="card-footer clearfix">
                <div class="row">
                    <div class="col-6">
                        {{ $data->links() }}
                    </div>

                    <div class="col-6 text-right">
                    </div>
                </div>
            </div>
    </div>
  </div>
</div>
@stop