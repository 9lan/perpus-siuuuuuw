@extends('layout.main')

@section('content')
<div class="col-xl-7 col-lg-7">
    <div class="mb-4">
        <!-- Card Header - Dropdown -->
        <div class="py-3 d-flex flex-row align-items-center justify-content-between">
            <h1 class="m-0 font-weight-bold text-primary">Edit Rak Buku</h1>
        </div>

        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Card Body -->
        <div class="">
            <form action="{{ route('admin.edit-rak-buku', $rak_buku->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kode_rak" class="col-form-label">Kode Rak:</label>
                    <input type="text" class="form-control" id="kode_rak" name="kode_rak" value="{{ $rak_buku->kode_rak }}">
                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">Nama Rak:</label>
                    <input type="text" class="form-control" id="nama_rak" name="nama_rak" value="{{ $rak_buku->nama_rak }}">
                </div>
                <button type="submit" style="float: right;" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>
</div>
@endsection