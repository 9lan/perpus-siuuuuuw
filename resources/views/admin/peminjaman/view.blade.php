@extends('layout.main')

@section('content')
<div class="col-xl-7 col-lg-7">
    <div class="mb-4">
        <!-- Card Header - Dropdown -->
        <div class="py-3 d-flex flex-row align-items-center justify-content-between">
            <h1 class="m-0 font-weight-bold text-primary">Detail Peminjaman</h1>
        </div>

        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Card Body -->
        <div class="">
            <form action="{{ route('admin.peminjaman.view', $dt->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul" class="col-form-label">Nama Peminjam:</label>
                    <h3>{{ $dt->user->name }}</h3>
                </div>
                <div class="form-group">
                    <label for="judul" class="col-form-label">Judul Buku:</label>
                    <h3>{{ $dt->buku->judul }}</h3>
                </div>
                
                <div class="form-group">
                    <label for="judul" class="col-form-label">Tanggal Pinjam:</label>
                    <h3>{{ $dt->tanggal_pinjam }}</h3>
                </div>

                <div class="form-group">
                    <label for="judul" class="col-form-label">Tanggal Kembali:</label>
                    <h3>{{ $dt->tanggal_kembali }}</h3>
                </div>

                <div class="form-group">
                    <label for="judul" class="col-form-label">Tanggal Dikembalikan:</label>
                    <input type="date" class="form-control" name="tanggal_kembali" required>
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Status:</label>
                    <h3>
                        @if($dt->status == 'booking')
                            <span class="p-2 badge badge-warning">Booking</span>
                        @elseif($dt->status == 'dipinjam')
                            <span class="p-2 badge badge-success">Dipinjam</span>
                        @else
                            <span class="p-2 badge badge-danger">Dikembalikan</span>
                        @endif
                    </h3>
                </div>
                <button type="submit" style="float: right;" class="btn btn-primary" onclick="">Kembalikan</button>
            </form>
        </div>
    </div>
</div>
@endsection