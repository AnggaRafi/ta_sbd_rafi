@extends('pelanggan.layout')
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
<h5 class="card-title fw-bolder mb-3">Ubah Data Pelanggan</h5>

<form method="post" action="{{route('pelanggan.update', $data->id_pelanggan) }}">

@csrf
<!-- Id Pelanggan -->

<div class="mb-3">
<label for="id_pelanggan" class="form-label">ID pelanggan</label>
<input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="{{$data->id_pelanggan}}">
</div>

<!-- Nama Pelanggan-->

<div class="mb-3">
<label for="nama_pelanggan" class="form-label">Nama pelanggan</label>
<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{$data->nama_pelanggan}}">
</div>

<!-- Alamat Pelanggan -->

<div class="mb-3">
<label for="alamat_pelanggan" class="form-label">alamat pelanggan</label>
<input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" value="{{$data->alamat_pelanggan}}">
</div>

<!-- Id Pelanggan -->
<div class="mb-3">
<label for="id_admin" class="form-label">ID Admin</label>
<input type="text" class="form-control" id="id_admin" name="id_admin" value="{{$data->id_admin}}">
</div>

<div class="text-center">
<input type="submit" class="btn btn-primary" value="Ubah" />

</div>
</form>
</div>
</div>
@stop