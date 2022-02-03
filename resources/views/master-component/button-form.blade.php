@if($title == 'Tambah')
<button type="submit" class="btn btn-sm btn-success">
    <i class="fas fa-redo-alt"></i>&nbsp; Simpan
</button>
&nbsp;
@endif
<button type="submit" class="btn btn-sm btn-primary">
    <i class="fas fa-save"></i> &nbsp; Simpan dan Tutup
</button>
&nbsp;
<a href="{{url(request()->segment(1))}}" class="btn btn-sm btn-warning text-white">
    <i class="fas fa-backward"></i>&nbsp; Kembali
</a>