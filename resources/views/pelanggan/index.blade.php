@extends('pelanggan.layout')
@section('content')

<h4 class="mt-5">Data Pelanggan</h4>
<a href="{{ route('pelanggan.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data Pelanggan</a>
<a href="{{ route('gabung.index') }}" type="button" class="btn btn-success rounded-3">Data Join</a>
<a href="{{ route('ikan.index') }}" type="button" class="btn btn-success rounded-3">Data Ikan</a>
<a href="{{ route('admin.index') }}" type="button" class="btn btn-success rounded-3">Data Admin</a>
<a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
{{ $message }}
</div>
@endif
<!-- SEARCH QUERY -->

<!-- TABEL -->
<table class="table table-hover mt-2">
<thead>
<tr>
<th>No.</th>
<th>Nama Pelanggan</th>
<th>Alamat</th>
<th>Id Admin</th>
</tr>
</thead>
<tbody>
@foreach ($datas as $data)

<tr>
<td>{{ $data->id_pelanggan }}</td>
<td>{{ $data->nama_pelanggan }}</td>
<td>{{ $data->alamat_pelanggan }}</td>
<td>{{ $data->id_admin }}</td>
<td>
<a href="{{ route('pelanggan.edit', $data->id_pelanggan) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
<a href="{{ route('pelanggan.softdelete', $data->id_pelanggan) }}" type="button" class="btn btn-info">Soft Hapus</a>

<!-- TAMBAHKAN KODE DELETE DIBAWAH
BARIS INI -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_pelanggan }}">Hapus</button>
<!-- Modal -->
<div class="modal fade" id="hapusModal{{ $data->id_pelanggan }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>

<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form method="POST" action="{{ route('pelanggan.delete', $data->id_pelanggan) }}">
@csrf

<div class="modal-body">

Apakah anda
yakin ingin menghapus data ini?
</div>

<div class="modal-footer">

<button

type="button" class="btn btn-secondary" data-bs-
dismiss="modal">Tutup</button>

<button
type="submit" class="btn btn-primary">Ya</button>
</div>
</form>
</div>
</div>
</div>
<!-- DELETE -->
</td>
</tr>
@endforeach
</tbody>
</table>

@stop