@extends('layout.main')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h1 class="m-0 font-weight-bold text-primary">List Rak Buku</h1>
<div class="container-fluid p-1">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary mb-2" style="float:right;" data-bs-toggle="modal" data-bs-target="#tambah-rak-buku" data-whatever="Guru">Tambah Rak Buku</button>
    </div>
</div>

<div class="table-responsive border px-2 py-4">
    <table class="table table-bordered table-hover table-striped " id="data-table">
        <thead style="background-color: #4e73df;">
            <tr class="text-light">
                <th scope="col">No</th>
                <th scope="col">Kode Rak</th>
                <th scope="col">Nama Rak</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $i=1; ?>
            @foreach ($rak_buku as $rb)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $rb->kode_rak}}</td>    
                <td>{{ $rb->nama_rak}}</td> 
                <td>
                    <a class="btn btn-primary mr-2" href="/admin/rak-buku/{{ $rb->id }}">Edit</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

{{-- Modal Add --}}
<div class="modal fade" id="tambah-rak-buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rak Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.rak-buku') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_rak" class="col-form-label">Kode Rak Buku:</label>
                        <input type="text" class="form-control @error('kode_rak') is-invalid @enderror" id="kode_rak" name="kode_rak" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_rak" class="col-form-label">Nama Rak Buku:</label>
                        <input type="text" class="form-control @error('nama_rak') is-invalid @enderror" id="nama_rak" name="nama_rak" required>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" style="float: right;" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection