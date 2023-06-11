@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

<!-- START FORM -->
<form action="{{ route('blank.update', $blank->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nomor_sekolah" class="col-sm-2 col-form-label">ID Sekolah</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="nomor_sekolah" id="nomor_sekolah" value="{{ old('nomor_sekolah') ?? $blank->nomor_sekolah }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="sekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="sekolah" id="sekolah" value="{{ old('sekolah') ?? $blank->sekolah }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="tahun" id="tahun" value="{{ old('tahun') ?? $blank->tahun }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kegiatan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('notif')
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
    <div class="alert alert-success border-left-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@endpush

