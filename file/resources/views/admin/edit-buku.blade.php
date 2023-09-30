@extends('layout.main')

@section('content')
<div class="col-xl-7 col-lg-7">
    <div class="mb-4">
        <!-- Card Header - Dropdown -->
        <div class="py-3 d-flex flex-row align-items-center justify-content-between">
            <h1 class="m-0 font-weight-bold text-primary">Edit Buku</h1>
        </div>

        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Card Body -->
        <div class="">
            <form action="{{ route('admin.edit-buku', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kode_buku" class="col-form-label">Kode Buku:</label>
                    <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="{{ $data->kode_buku }}">
                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">Nama Rak Buku:</label>
                    <select id="status" class="form-control" name="kode_rak">
                        <option {{ $data->kode_rak == "" ? 'selected' : '' }} value="">Pilih Nama Rak</option>
                        @foreach ($rak_buku as $rak)
                            <option {{ $data->kode_rak == $rak->kode_rak ? 'selected' : '' }} value="{{ $rak->kode_rak }}"> {{ $rak->nama_rak }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="judul" class="col-form-label">Judul:</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $data->judul }}">
                </div>
                <div class="form-group">
                    <label for="sinopsis" class="col-form-label">Sinopsis:</label>
                    <input type="text" class="form-control" id="sinopsis" name="sinopsis" value="{{ $data->sinopsis }}">
                </div>
                <div class="form-group">
                    <label for="penulis" class="col-form-label">Penulis:</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $data->penulis }}">
                </div>
                <div class="form-group">
                    <label for="denda" class="col-form-label">Denda:</label>
                    <input type="number" class="form-control" id="denda" name="denda" value="{{ $data->denda }}">
                </div>
                <div class="form-group">
                    <label for="foto" class="col-form-label">Foto:</label>
                    <img src="/images/{{ $data->foto }}" alt="{{ $data->judul }}" width="100px" height="100px">
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">Status:</label>
                    <select id="status" class="form-control" name="status">
                        <option value="" {{ $data->status == "" ? 'selected' : '' }}>Pilih Status</option>
                        <option value="Tersedia" {{ $data->status == "tersedia" ? 'selected' : '' }}>Tersedia</option>
                        <option value="Dipinjam" {{ $data->status == "dipinjam" ? 'selected' : '' }}>Dipinjam</option>
                    </select>
                </div>
                <button type="submit" style="float: right;" class="btn btn-primary" onclick="">Simpan</button>
            </form>
            
            <form action="{{ route('admin.edit-buku', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                {{-- <input type="hidden" name="id" value="{{$buku->id}}"/> --}}
                <button type="submit" style="float: right;" class="btn btn-danger mr-2">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection