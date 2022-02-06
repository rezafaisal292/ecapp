@php
$segment = request()->segment(1);
@endphp
@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('title', env('APP_NAME').'::Test1')

@section('content_header')
    <h1 class="m-0 text-dark">Test1</h1>
@stop

@section('content')
@include('test1::filter')
    @include('master-component.alert')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6" style="text-align:left">
             {{-- Total Data : {{$data->total()}}  --}}
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
             {{-- @foreach ($data as $d)
            <tr>
              <td>
              @include('master-component.button-edit-delete')
              </td>
              
            </tr>
            @endforeach  --}}
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix float-right">

        <div class="row">
          <div class="col-6">

          </div>
          <div class="col-6 text-right">
           
              @include('master-component.button-add')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
