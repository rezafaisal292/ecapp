<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route(request()->segment(1).'.destroy', $d->id) }}" method="POST">

    @if(Auth::user()->hasPermission($segment.'.edit'))
    <a href="{{ route(request()->segment(1).'.edit', $d->id) }}" class="btn btn-sm btn-warning text-white">
        <i class="fas fa-edit"></i>
    </a> &nbsp;
    @endif
    @if(Auth::user()->hasPermission($segment.'.destroy'))
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="fas fa-trash-alt"></i>
    </button>
    @endif
</form>