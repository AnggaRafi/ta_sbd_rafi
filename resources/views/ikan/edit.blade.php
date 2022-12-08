@extends('ikan.layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<div class="card mt-4">
<div class="card-body">
<h5 class="card-title fw-bolder mb-3">Ubah Data Ikan</h5>

<form method="post" action="{{route('ikan.update', $data->id_ikan) }}">

@csrf
<!-- SECTION ID -->

<div class="mb-3">
<label for="id_ikan" class="form-label">ID Ikan</label>
<input type="text" class="form-control" id="id_ikan" name="id_ikan" value="{{$data->id_ikan}}">
</div>

<!-- SECTION NAMA -->

<div class="mb-3">
<label for="nama_ikan" class="form-label">Nama ikan</label>
<input type="text" class="form-control" id="nama_ikan" name="nama_ikan" value="{{$data->nama_ikan}}">
</div>

<!-- SECTION HARGA -->

<div class="mb-3">
<label for="harga_ikan" class="form-label">Harga Ikan</label>
<input type="text" class="form-control" id="harga_ikan" name="harga_ikan" value="{{$data->harga_ikan}}">
</div>

<!-- SECTION STOK -->

<div class="mb-3">
<label for="stok_ikan" class="form-label">Stok Ikan</label>
<input type="text" class="form-control" id="stok_ikan" name="stok_ikan" value="{{$data->stok_ikan}}">
</div>

<!-- SECTION ID ADMIN -->

<div class="mb-3">
<label for="id_admin" class="form-label">Id Admin</label>
<input type="text" class="form-control" id="id_admin" name="id_admin" value="{{$data->id_admin}}">
</div>

<!-- SECTION BUTTON -->

<div class="text-center">
<input type="submit" class="btn btn-primary" value="Ubah" />
</div>

<!-- SECTION SELESAI -->
</form>
</div>
</div>
@stop