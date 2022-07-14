@extends('layout.main')

@section('content')
<h1>List Pengembalian Buku</h1>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container-fluid p-1">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary mb-2" style="float:right;" data-bs-toggle="modal" data-bs-target="#verif-pengembalian">Verifikasi Pengembalian</button>
    </div>
</div>

<div class="table-responsive border px-2 py-4">
    <table class="table table-bordered table-hover table-striped " id="data-table">
        <thead style="background-color: #4e73df;">
            <tr class="text-light">
                <th scope="col">ID</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Jumlah Hari</th>
                <th scope="col">Total Denda</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->id }}</td>
                <td>{{ $dt->user->name }}</td>
                <td>{{ $dt->buku->judul }}</td>
                <td>{{ $dt->tanggal_kembali }}</td>
                <td>{{ $dt->jumlah_hari }}</td>
                <td>{{ $dt->total_denda }}</td>
                <td>{{ $dt->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    
{{-- Modal Verif Peminjaman --}}
<div class="modal fade" id="verif-pengembalian" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pengembalian</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.pengembalian') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status" class="col-form-label">Pilih ID Pengembalian: </label>
                        <select id="status" class="form-control" name="id" required>
                            <option value="" selected>Pilih ID Pengembalian</option>
                            @foreach ($verif_status as $p)
                                <option value="{{ $p->id }}"> {{ $p->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-form-label">Ubah Status: </label>
                        <select id="status" class="form-control" name="status" required>
                            <option value="" selected>Pilih Status</option>
                            <option value="Terbayar">Sudah di bayar</option>
                        </select>
                    </div>
                    <button type="submit" style="float: right;" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection