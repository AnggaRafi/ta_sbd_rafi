@extends('gabung.layout')
@section('content')
<h4 class="mt-5">Data Gabungan</h4>
<a href="{{ route('admin.index') }}" type="button" class="btn btn-success rounded-3">Kembali ke Data Admin</a>
<a href="{{ route('ikan.index') }}" type="button" class="btn btn-success rounded-3">Kembali ke Data Ikan</a>
<a href="{{ route('pelanggan.index') }}" type="button" class="btn btn-success rounded-3">Kembali ke Data Pelanggan</a>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
{{ $message }}
</div>
@endif
<table class="table table-hover mt-2">

<!-- TABLE HEAD -->
<thead>
<tr>
<th>ID Admin</th> <th>Nama Pelanggan</th> <th>Alamat Pelanggan</th> <th>Nama Ikan</th> 
</tr>
</thead>

<!-- TABLE BODY -->
<tbody>
@foreach ($datah as $data)
<tr>
<td>{{ $data->id_admin }}</td>
<td>{{ $data->nama_pelanggan }}</td>
<td>{{ $data->alamat_pelanggan }}</td>
<td>{{ $data->nama_ikan }}</td>
</tr>
@endforeach
</tbody>
</table>
@stop