
@if(Auth::user()->hasPermission($segment.'.create'))
<a href="{{route($segment.'.create')}}" class="btn btn-primary btn-sm">
    <i class="fas fa-plus"></i>&nbsp; Tambah
</a>
@endif