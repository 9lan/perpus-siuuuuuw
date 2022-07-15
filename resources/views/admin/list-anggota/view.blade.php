@extends('layout.main')

@section('content')
<div class="col-xl-7 col-lg-7">
    <div class="mb-4">
        <!-- Card Header - Dropdown -->
        <div class="py-3 d-flex flex-row align-items-center justify-content-between">
            <h1 class="m-0 font-weight-bold text-primary">{{ $anggota->name  }}</h1>
        </div>

        {{-- @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif --}}

        <!-- Card Body -->
        <div class="">
            <form action="{{ route('admin.anggota.view', $anggota->id) }}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kode_buku" class="col-form-label">Nama Anggota:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $anggota->name }}">
                </div>

                <div class="form-group">
                    <label for="kode_buku" class="col-form-label">No HP:</label>
                    <input type="text" class="form-control" id="telp" name="telp" value="{{ $anggota->telp }}">
                </div>

                <div class="form-group">
                    <label for="kode_buku" class="col-form-label">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $anggota->tanggal_lahir }}">
                </div>

                <div class="form-group">
                    <label for="kode_buku" class="col-form-label">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $anggota->alamat }}">
                </div>

                <div class="form-group">
                    <label for="kode_buku" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $anggota->email }}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="foto" class="col-form-label">Foto:</label>
                    <img class="d-block" src="{{ env('APP_URL') . ':8000/storage/' . $anggota->foto }}" alt="{{ 'Foto ' . $anggota->name }}" width="100px" height="100px">
                    <input type="file" class="form-control" id="foto-baru" name="foto-baru">
                </div>
                
                <button type="submit" style="float: right;" class="btn btn-primary" onclick="">Simpan</button>
            </form>
            
            <form action="{{ route('admin.anggota.view', $anggota->id) }}" method="POST">
                @csrf
                @method('DELETE')
                {{-- <input type="hidden" name="id" value="{{$buku->id}}"/> --}}
                <button type="submit" style="float: right;" class="btn btn-danger mr-2">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection