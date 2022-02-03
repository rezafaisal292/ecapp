@php
$segment = request()->segment(2);
$title = 'Tambah'; $method = 'post'; $action = 'masterrole.store';
if ($segment !== 'create' ) { $title = 'Ubah'; $method = 'put'; $action = ['masterrole.update', $d->id]; }
@endphp
@extends('adminlte::page')
@section('title', env('APP_NAME').'::'.$title.' MasterRole')
@section('content')

@section('content_header')
<h1 class="m-0 text-dark">Master Role</h1>
@stop
{{ Form::open(['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-data', 'autocomplete' => 'off']) }}
<div class="card card-primary">
    <div class="card-header">
        {{$title}} Data Master Role
    </div>
    <div class="card-body">
       
            @foreach($page as $p)
            <b>{{$p->nama}}</b>
            <br>
            @foreach($d->permissions as $per)

            @if (preg_match("/" . $p->url . "/i", $per->name))
            {{$per->display_name}}
            @endif
            @endforeach
            <br>
            
            @endforeach
    </div>

    <div class="card-footer clearfix text-right">
        @include('master-component.button-form')
    </div>
</div>
{{ Form::close() }}
@endsection