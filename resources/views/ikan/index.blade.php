@extends('ikan.layout')
@section('content')
<h4 class="mt-5">Data ikan</h4>
<a href="{{ route('ikan.create') }}" type="button"class="btn btn-success rounded-3">Tambah Data Ikan</a>
<a href="{{ route('gabung.index') }}" type="button" class="btn btn-success rounded-3">Data Join</a>
<a href="{{ route('admin.index') }}" type="button" class="btn btn-success rounded-3">Data Admin</a>
<a href="{{ route('pelanggan.index') }}" type="button" class="btn btn-success rounded-3">Data Pelanggan</a>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
{{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
<thead>
<tr>
<th>Id Ikan</th>
<th>Nama Ikan</th>
<th>Harga Ikan</th>
<th>Stok Ikan</th>
<th>ID Admin</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach ($datas as $data)

<tr>
<td>{{ $data->id_ikan }}</td>
<td>{{ $data->nama_ikan }}</td>
<td>{{ $data->harga_ikan }}</td>
<td>{{ $data->stok_ikan }}</td>
<td>{{ $data->id_admin }}</td>
<td>
<a href="{{ route('ikan.edit', $data->id_ikan) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
<a href="{{ route('ikan.softdelete', $data->id_ikan) }}" type="button" class="btn btn-info">Soft Hapus</a>

<!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
<!-- Button trigger modal -->

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_ikan }}">Hapus</button>

<!-- MODAL -->
<div class="modal fade" id="hapusModal{{ $data->id_ikan }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<!-- MODAL HEADER -->

<div class="modal-header">
<h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<!-- FORM MULAI -->
<form method="POST" action="{{ route('ikan.delete', $data->id_ikan) }}">
@csrf

<!-- MODAL BODY -->

<div class="modal-body"> Apakah anda yakin ingin menghapus data ini? </div>

<!-- MODAL FOOTER -->

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
<button type="submit" class="btn btn-primary">Ya</button>
</div>

<!-- FORM AKHIR -->
</form>

</div>
</div>
</div>
<!-- DELETE -->
</td>
</tr>
@endforeach
</tbody></table>
@stop