@php
$segment = request()->segment(2);
$title = 'Tambah';
$method = 'post';
$action = 'masterrole.store';
if ($segment !== 'create') {
    $title = 'Ubah';
    $method = 'put';
    $action = ['masterrole.update', $d->id];
}
$checked = false;
@endphp
@extends('adminlte::page')
@section('title', env('APP_NAME') . '::' . $title . ' MasterRole')
@section('content')

@section('content_header')
    <h1 class="m-0 text-dark">Master Role</h1>
@stop
{{ Form::open(['route' => $action,'method' => $method,'class' => 'form-horizontal form-data','autocomplete' => 'off']) }}
<div class="card card-primary">
    <div class="card-header">
        {{ $title }} Data Master Role
    </div>
    <div class="card-body">
<div class="row">
    <div class="col-md-12">
        {{ Form::fgText('Nama Role', 'name', $d->name, ['class' => 'form-control'], null, 'text', true) }}
    </div>
</div>
        @foreach ($page as $p)
            <div class="row">
                <div class="col-md-12">
                    <b>{{ $p->nama }}</b>
                </div>
            </div>
            <div class="row">
                @foreach ($permission as $per)
                    @if (preg_match('/' . $p->url . '/i', $per->name))
                        <div class="col-md-2">
                            {{ Form::checkbox('permission[]', $per->id, count($d->permissions->where('id',$per->id)) >0 ? true :false) }}
                            {{ $per->display_name }}
                        </div>
                    @endif

                @endforeach
            </div>
            <hr>
        @endforeach
    </div>

    <div class="card-footer clearfix text-right">

        @include('master-component.button-form')
    </div>
</div>
{{ Form::close() }}
@endsection
