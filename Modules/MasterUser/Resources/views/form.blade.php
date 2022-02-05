@php
$segment = request()->segment(2);
$title = 'Tambah'; $method = 'post'; $action = 'masteruser.store';
if ($segment !== 'create' ) { $title = 'Ubah'; $method = 'put'; $action = ['masteruser.update', $d->id]; }
@endphp
@extends('adminlte::page')
@section('title', env('APP_NAME').'::'.$title.' MasterUser')
@section('content')

@section('content_header')
<h1 class="m-0 text-dark">MasterUser</h1>
@stop
{{ Form::open(['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-data', 'autocomplete' => 'off']) }}
<div class="card card-primary">
    <div class="card-header">
        {{$title}} Data MasterUser
    </div>
    <div class="card-body">
        <div class="form-group ">
            {{ Form::fgText('Divisi Kode', 'divisi_kode', $d->divisi_kode, ['class' => 'form-control'], null, 'text', true) }}
                
        </div>
    </div>

    <div class="card-footer clearfix text-right">
        @include('master-component.button-form')
    </div>
</div>
{{ Form::close() }}
@endsection